<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex(){
        $students = User::where('role','student')->get();
        return view('admin.index',['students'=>$students]);
    }
}
