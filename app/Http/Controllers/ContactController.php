<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request)
    {
        //
        app('flasher')->addSuccess('Message Submitted Successfully.', 'Success');

        return view('contact');
    }
}
