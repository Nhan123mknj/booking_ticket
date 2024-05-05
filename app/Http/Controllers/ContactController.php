<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
class ContactController extends Controller
{
    public function contact() {
        $contact = $this->GetContact();
        return view('page.contact', [
            'contacts'=>$contact,
        ]);
    }
    private function GetContact() {
        return [
            'title' => 'Welcome to Our Movie Site',
            'content' => 'Enjoy our curated list of movies and shows.'
        ];
    }
}
