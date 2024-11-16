<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class ImgServe extends Controller
{
    public function serveFile($subfolder, $filename)
    {
        Log::info('Serve file method hit for filename: ' . $subfolder . '/' . $filename);
        
        
    
        // Construct the full path with subfolder handling
        $path = storage_path('app/.private/' . $subfolder . '/' . $filename);
    
        Log::info('Attempting to serve file from: ' . $path);
    
        if (file_exists($path)) {
            return response()->file($path);
        }
    
        abort(404, 'File not found');
    }
    
    
}
