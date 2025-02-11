<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $contactInfo = [
            'email' => 'contact@fakeemail.com',
            'address' => '123 Fake Street, Springfield, USA',
            'phone' => '(555) 123-4567'
        ];

        return view('contact.show', compact('contactInfo'));
    }
}
