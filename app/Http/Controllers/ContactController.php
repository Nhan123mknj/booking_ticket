<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    protected $primaryKey = 'ContactId';
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
    public function index(){
        $contact = Contact::paginate(10);
        return view('admin.contact.contact', [
            "contact"=>$contact,

        ]);
    }
    public function show($id){
        $contact = Contact::where('id', $id)->first();
        // dd($contact);
        if($contact->IsRead == 0){
        $contact->IsRead = 1;
        $contact->save();
        }
        return view('admin.contact.detail', ['contact' => $contact]);
    }

    public function destroy($id){
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
