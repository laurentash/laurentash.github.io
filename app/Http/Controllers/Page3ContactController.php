<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class Page3ContactController extends Controller
{
    public function index() {
        return view('contact');
    } 

    public function sendmail(Request $details) {
        $details->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'message' => 'required'
        ]);

        Contact::create($details->all());
        return redirect()->back()->with(['success' => 'Thank you!']);
    }
}
