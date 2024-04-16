<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Roombook extends Controller{


    public function _show()
    {
        return view('Admin/Roombook');
    }

    public function _store()
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

    public function _confirm(){
        $id = $id->session()->get('id');
        $stat = $stat->session()->get('stat')->set('Confirmed');
        $data = array('stat'=>$stat);
        DB::table('Roombook')->where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Room Booked Confirmed Successfully');
    }

    public function _delete(){
        $id = $id->session()->get('id');
        $data = array('id'=>$id,'Name' => '','Email' => '','Phone' => '','Roomtype' => '','Bed' => '','Noofroom' => '','Meal' => '','cin' => '','cout' => '','stat' => '');
        DB::table('Roombook')->where('id',$id)->delete($data);
        return redirect()->back()->with('success', 'Room Booked Deleted Successfully');
    }
}
