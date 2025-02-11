<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function showUser() {
    return view('auth.backoffice');
    }
}

