<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function show($filename)
    {
        $filePath = storage_path('app/public/uploads/' . $filename);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        }

        abort(404);
    }
}
