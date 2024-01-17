<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class DisplayInstituteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
         // returns institute according to slug on the front-end
         $institute = Institute::where('slug', $slug)->firstOrFail();
         return view('institutes.show', compact('institute'));
    }
}
