<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function isAdmin()
    {
        return view('Admin.index');
    }
    public function loginAdmin()
    {
        return view('Admin.login');
    }
    public function create()
    {
        return view('Admin.addProduct');
    }
}
