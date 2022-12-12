<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactPage(){
        $names = ["Toto", "Tutu", "Titi"];
        return view('pages.contact', compact('names'));
    }

    public function sendContact(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        dd($request->email);
    }
}
