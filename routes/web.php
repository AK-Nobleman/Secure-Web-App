<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



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
