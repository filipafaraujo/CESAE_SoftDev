<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $myVar = 'Hello World';

         $contactInfo = ['nome', 'email'];

        //Formas de debug
        //dd();
        //var_dump();


        $contactInfo = $this ->getContactInfo();

        return view('home', compact('myVar', 'contactInfo'));
    }


    private function getContactInfo() { //protected function
        $contactInfo= [
            'name' => 'Filipa',
            'email' => 'filipa@gmail.com'
        ];

        return $contactInfo;
    }


}
