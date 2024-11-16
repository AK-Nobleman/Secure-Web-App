<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImgServe;
use App\Http\Controllers\PageChange;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('landing');
})->name('Landing');

Route::post('/submit-form', [FormController::class, 'StoreSuggestion'])->name('submitForm');
Route::get('/Contact', [PageChange::class, 'ContactPage'])->name('Contact');
Route::get('/About', [PageChange::class, 'AboutPage'])->name('About');
Route::get('/Register', [PageChange::class, 'RegisterPage'])->name('Register');
Route::get('/Login', [PageChange::class, 'LoginPage'])->name('Login');
Route::post('/register', [FormController::class, 'RegistrationPage'])->name('register');
Route::post('/login', [FormController::class, 'Login'])->name('submitLogin');
Route::get('/Dashboard', [PageChange::class, 'DashboardPage'])->name('Dashboard');
Route::get('/SettingA', [PageChange::class, 'SettingAdmin'])->name('SettingAdmin');
Route::get('/SettingU', [PageChange::class, 'SettingUser'])->name('SettingUser');
Route::get('/SettingAR', [PageChange::class, 'SettingAdminR'])->name('SettingAdminR');
Route::get('/file/{subfolder}/{filename}', [ImgServe::class, 'serveFile'])->name('serveFile');
Route::get('/SettingAM', [PageChange::class, 'SettingAdminM'])->name('SettingAdminM');
Route::get('/SettingAS', [PageChange::class, 'SettingAdminS'])->name('SettingAdminS');
Route::post('/logout', [FormController::class, 'logout'])->name('logout');
Route::post('/accept', [FormController::class, 'acceptRequest'])->name('acceptRequest');
Route::post('/reject', [FormController::class, 'rejectRequest'])->name('rejectRequest');
Route::get('/SettingUF', [PageChange::class, 'SettingUserF'])->name('SettingUserF');
Route::get('/SettingUA', [PageChange::class, 'SettingUserA'])->name('SettingUserA');
Route::delete('/delete', [FormController::class, 'deleteAccH'])->name('deleteAcc');
Route::delete('/deletes', [FormController::class, 'deleteAccPure'])->name('deleteAccP');
Route::post('/del', [PageChange::class, 'rejectDel'])->name('rejectDel');
Route::post('/addDev', [FormController::class, 'addDevice'])->name('addDevice');
Route::delete('/device/{id}', [FormController::class, 'destroy'])->name('device.destroy');



Route::get('/test-db-connection', function () {
    try {
        // Test the database connection
        DB::connection()->getPdo();

        // Execute a query to fetch all users (change 'users' to your actual table name)
        $users = DB::table('head')->get();

        return response()->json([
            'message' => 'Database connected successfully!',
            'data' => $users
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Database connection failed: ' . $e->getMessage()
        ]);
    }
});
