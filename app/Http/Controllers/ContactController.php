<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function contact() {
        return view('page.contact');
    }
    public function sendcontact(Request $request){

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Gui  thanh cong');
    }
}
