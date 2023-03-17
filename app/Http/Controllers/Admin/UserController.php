<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class UserController extends Controller
{
    public function index(){
        return view('admin.user', ['users'=>Admin::all()]);
    }
}
