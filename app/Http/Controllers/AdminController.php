<?php

namespace App\Http\Controllers;



class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function customers()
    {
        return view('admin.customers');
    }
}
