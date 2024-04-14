<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class User extends Controller{

    public function _show()
    {
        return view('User.blade.php');
    }

    public function _store(Request $stat,Request $Name,Request $Email,Request $Phone , Request $Roomtype ,Request $Bed ,Request $Noofroom ,Request $Meal ,Request $cin ,Request $cout)
{
    $Name = $Name->input('Name');
    $Email = $Email->input('Email');
    $Phone = $Phone->input('Phone');
    $Roomtype = $Roomtype->input('Roomtype');
    $Bed = $Bed->input('Bed');
    $Noofroom = $Noofroom->input('Noofroom');
    $Meal = $Meal->input('Meal');
    $cin = $cin->input('cin');
    $cout = $cout->input('cout');
    $stat = $stat->input('stat')->set('NotConfirmed');


    $data = array('Name'=>$Name,'Email'=>$Email,'Phone'=>$Phone,'Roomtype'=>$Roomtype,'Bed'=>$Bed,'Noofroom'=>$Noofroom,'Meal'=>$Meal,'cin'=>$cin,'cout'=>$cout);

    DB::table('Roombook')->insert($data);
    return redirect()->back()->with('success', 'Room Booked Successfully');
}
public function _logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
