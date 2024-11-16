<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestions;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function StoreSuggestion(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'suggestion' => 'nullable|string|max:500',
        ]);

        $first = $request->input('firstName');
        $last = $request->input('lastName');

        $fullname = $first. ' ' . $last;


        Suggestions::create([
            'name' => $fullname,
            'email' => $request->input('email'),
            'suggestions' => $request->input('suggestion'),
        ]);


        return redirect()->back()->with('success', 'Suggestion Sent Successfully');
    }

    public function RegistrationPage(Request $request){
        if($request->role =='member'){
            $validatedData = $request->validate([
                'username' => 'required|unique:family_member',
                'password' => 'required|min:8|confirmed',
                'role' => 'required|in:member',
                'head' => 'required|exists:head,family_id',
            ],[
                'username.required' => 'Please provide a username.',
                'username.unique' => 'Please provide a different username.',
                'password.require' => 'Please provide a password',
                'password.min' => 'Please provide a longer password',
                'password.confirmed' => 'Password doesnt match',
                'head.required' => 'Please provide your parent ID',
                'head.exists' => 'Please ask your parent for their ID',
            ]);
            $validatedData['password'] = password_hash($request->password,PASSWORD_ARGON2ID);
            DB::table('family_member')->insert([
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
                'family_id' => $validatedData['head'],
            ]);
            DB::table('head')
                ->where('family_id', $validatedData['head'])  
                ->increment('family_member'); 
            return redirect()->back()->with('success', 'Registration successful!');
        }
        else if($request->role == 'head')
        {
            $validatedData = $request->validate([
                'username' => 'required|unique:head',
                'password' => 'required|min:8|confirmed',
                'role' => 'required|in:head,member',
                'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'nik' => 'required|numeric|digits:16',
            ],[
                'username.required' => 'Please provide a username.',
                'username.unique' => 'Please provide a different username.',
                'password.require' => 'Please provide a password',
                'ktp.required' => 'KTP photo needed',
                'ktp.mimes' => 'File extension needs to be jpeg png jpg',
                'nik.required' => 'Please provide your NIK',
                'nik.numeric' => 'NIK is numbers',
                'nik.digits' => 'NIK has 16 numbers',
            ]);
    
            $filePath = $request->file('ktp')->store('ktp', 'private');
            
            $validatedData['password'] = password_hash($request->password,PASSWORD_ARGON2ID);
    
            if ($request->hasFile('ktp')) {
                $ktpFile = $request->file('ktp');
                $ktpPath = $ktpFile->store('ktp_images', 'public'); 
                $validatedData['ktp'] = $ktpPath;
            }

            $validatedData['family_id']=strtoupper(substr($request->username, 0, 3)) . rand(10, 99);
            $validatedData['image_path']=$filePath;
            $validatedData['image_name']=$request->username;

            Registration::create($validatedData);

            return redirect()->back()->with('success', 'Data saved successfully.');
        }

        return redirect()->back()->with('success', 'Registration successful!');
    }

    public function Login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Please provide a username.',
            'password.required' => 'Please provide a password.',
        ]);
    
        // First, check in the `heads` table
        $user = DB::table('head')
            ->where('username', $request->username)
            ->select('head.*', DB::raw("'head' as role"))
            ->first();
        $val=0;
        if (!$user) {
            $user = DB::table('family_member')
                ->join('head', 'family_member.family_id', '=', 'head.family_id') // Join to get head info
                ->where('family_member.username', $request->username)
                ->select('family_member.*', 'head.username as head_username', DB::raw("'member' as role"))
                ->first();
                $val = 1;
        }
        if($user){
            if($user->family_id == 'ADM01') $role ='Admin';
            else if($val ==1) $role ='Family Member';
            else $role ='Family Head';
        }
        

        if ($user && password_verify($request->password, $user->password)) {
            session([
                'role' => $role,
                'username' => $user->username,
                'family_id' => $user->family_id,
            ]);
            return redirect()->route('Dashboard');
        } else {
            return back()->withErrors(['password' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout(); 
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function acceptRequest(Request $request){
        $memberAmount =0;
        DB::table('head')->insert([
            'family_id' => $request->input('family_id'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'family_member' => $memberAmount,
        ]);

        DB::table('photo')->where('family_id', $request->input('family_id'))->delete();
        $photoPath = storage_path('app/.private/' . $request->input('image_path')); // Full path to the file
        LOG::info($request->image_path);
        if (is_file($photoPath)) {
            unlink($photoPath);
        } else {
            Log::warning('File does not exist or is a directory: ' . $photoPath);
        }
        return redirect()->back()->with('success', 'Data inserted and request deleted successfully.');
}
    public function rejectRequest(Request $request){
        $familyId = $request->input('family_id');
        

        DB::table('photo')
            ->where('family_id', $familyId)
            ->delete();
            return redirect()->back();   
    }

public function deleteAccH(Request $request)
{
    DB::table('delacc')->insert([
        'family_id' => $request->input('family_id'),
        'reason' => $request->input('reason'),
        'username' => $request->input('username'),
    ]);
    return redirect()->back()->with('success', 'Account deleted successfully');
}

public function deleteAccPure(Request $request){
    DB::table('family_member')->where('family_id', $request->input('family_id'))->delete();

    DB::table('head')->where('family_id', $request->input('family_id'))->delete();

    return redirect()->route('Landing')->with('success', 'Account deleted successfully');
}
public function addDevice(Request $request){

    $request->validate([
        'deviceType' => 'required',
        'devicename' => 'required',
        'devicePriv' => 'required'
    ]);
    $familyid = $request->input('family_id');
    switch ($request->devicePriv) {
        case ("High"):
            $permission=3;
            break;
        case ("Medium"):
            $permission=2;
            break;
        case ("Low"):
            $permission=1;
            break;
    }
    DB::table('device')->insert([
        'family_id' => $familyid,
        'device_type' => $request->input('deviceType'),
        'device_name' => $request->input('devicename'),
        'permission' => $permission,
    ]);

    return redirect()->route('Dashboard')->with('success', 'Device added successfully');
}

public function destroy($name){
    $deleted = DB::table('devices')->where('device_name', $name)->delete();

    if ($deleted) {
        // If deletion was successful, redirect with a success message
        return redirect()->back()->with('success', 'Device deleted successfully.');
    } else {
        // If no rows were affected, the device with that ID was not found
        return redirect()->back()->with('error', 'Device not found.');
    }
}
}
