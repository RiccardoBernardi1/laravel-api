<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function email(Request $request)
    {
        Mail::to('boolfolio@boolfolio.com')->send(new NewContact($request->all()));
    }
}