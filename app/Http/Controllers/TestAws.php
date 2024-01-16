<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestAws extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        $url = "env('AWS_URL')";

        $images = [];
        $files = Storage::disk('s3')->files('images');

        foreach ($files as $file) {
        $images[] = [
        'name' => str_replace('images/', '', $file),
        'src' => $url . $file
        ];
    }

        return response()->json([
            'path'  => $url
        ]);

    }
}
