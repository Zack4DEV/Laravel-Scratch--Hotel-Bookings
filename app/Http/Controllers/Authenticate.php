<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Authenticate extends Controller{

    public function _signup(Request $Username,Request $Email ,Request $Password ,Request $CPassword)
    {
        $Username = $Username->input('Username');
        $Email = $Email->input('Email');
        $Password = $Password->input('Password');
        $CPassword = $CPassword->input('CPassword');
        $data = array('Username'=>$Username,'Email'=>$Email,'Password'=>$Password,'CPassword'=>$CPassword);
        $signup = DB::table('signup')->insert($data);
        if($signup){
            return redirect()->back()->with('success', 'Signup Successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function _admin(Request $Email , Request $Password)
    {
        $Email = $Email->input('Email');
        $Password = $Password->input('Password');
        $data = array('Email'=>$Email,'Password'=>$Password);
        $admin = DB::table('Emp_login')->where($data)->first();
        if($admin){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }

    public function _user(Request $Username,Request $Email ,Request $Password ,Request $CPassword)
    {
        $Username = $Username->input('Username');
        $Email = $Email->input('Email');
        $Password = $Password->input('Password');
        $CPassword = $CPassword->input('CPassword');
        $data = array('Username'=>$Username,'Email'=>$Email,'Password'=>$Password,'CPassword'=>$CPassword);
        $user = DB::table('signup')->where($data)->first();
        if($user){
            return redirect()->route('user.home');
        }else{
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }

}
