<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function profile($id){
        $user=User::find($id);
        return view('admin.profile',['user'=>$user]);
    }
}
