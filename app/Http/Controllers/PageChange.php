<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageChange extends Controller
{
    public function ContactPage(){
        return view('Contact');
    }
    public function AboutPage(){
        return view('About');
    }
    public function RegisterPage(){
        return view('Register');
    }
    public function LoginPage(){
        return view('Login');
    }

    public function RegistrationPage(){
        
    }
    public function VerificationPage(){
        return view('Verification');
    }
    public function DashboardPage(Request $request)
{
    $familyHeadId = $request->input('family_id');

    $devices = DB::table('device')
                ->where('family_id', $familyHeadId) 
                ->get();

    $noDevices = $devices->isEmpty();

    // Pass the devices and the "no devices" flag to the view
    return view('dashboard', compact('devices', 'noDevices'));
}
    public function SettingAdmin(){
        return view('SaCCadmin');
    }
    public function SettingAdminR(){
        $requests = DB::table('photo')->get();
        $dels = DB::table('delacc')->get();

        return view('SrEQadmin', compact('requests','dels'));
    }
    public function SettingAdminM(){
        $familyMembers = DB::table('head')->get();
        return view('SmEMadmin', compact('familyMembers'));
    }
    public function SettingAdminS() {
        // Assuming you have a 'suggestions' table in your database
        $suggestions = DB::table('suggestions')->get(); // Fetch all suggestions
    
        return view('SsUGadmin', compact('suggestions'));
    }
    public function SettingUser(){
        return view('SaCCmember');
    }
    public function SettingUserF(){
        $family_id = session('family_id');

        $data = DB::table('head')
    ->leftJoin('family_member', 'head.family_id', '=', 'family_member.family_id')
    ->select('head.*', 'family_member.*') // Select all columns from both tables
    ->where('head.family_id', '=', $family_id)
    ->get();
        
        return view('SmEMmember', compact('data'));
    }
    public function SettingUserA(){
        return view('SdELmember');
    }

    public function rejectDel(Request $request)
    {
        DB::table('delacc')->where('family_id', $request->input('family_id'))->delete();

        return redirect()->back()->with('success', 'Account rejected.');
    }
}
