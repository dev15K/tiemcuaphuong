<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('clients.index');
    }

    public function purchases()
    {

    }

    public function consultant()
    {

    }
}
