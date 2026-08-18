<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {

        $data = 'Contact - Online Store';
        $name = 'Cristian';
        $address = 'Calle 45 # 32-15, Medellín, Antioquia';
        $phone = '3217942414';

        return view('home.contact')->with('title', $data)
            ->with('subtitle', $name)
            ->with('address', $address)
            ->with('phone', $phone);
    }
}
