<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RoombookEdit extends Controller{


    public function _show()
    {
        return view('Admin/RoombookEdit');
    }

    public function _update()
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

    $data = array('Name'=>$Name,'Email'=>$Email,'Phone'=>$Phone,'Roomtype'=>$Roomtype,'Bed'=>$Bed,'Noofroom'=>$Noofroom,'Meal'=>$Meal,'cin'=>$cin,'cout'=>$cout);

    DB::table('Roombook')->insert($data);
    return redirect()->back()->with('success', 'Room Booked Updated Successfully');
    }

}
