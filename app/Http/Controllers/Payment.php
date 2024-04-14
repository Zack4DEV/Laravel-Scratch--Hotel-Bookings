<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Payment extends Controller{

    public function _store(Request $id,Request $Name,Request $roomtype,Request $bed,Request $cin ,Request $cout,Request $noofdays ,Request $noofroom ,Request $Meal ,Request $roomtotal ,Request $bedtotal ,Request $mealtotal,Request $finaltotal)
    {
        $id = $id->input('id');
        $Name = $Name->input('Name');
        $roomtype = $roomtype->input('roomtype');
        $bed = $bed->input('bed');
        $cin = $cin->input('cin');
        $cout = $cout->input('cout');
        $noofdays = $noofdays->input('noofdays');
        $noofroom = $noofroom->input('noofroom');
        $Meal = $Meal->input('Meal');
        $roomtotal = session($roomtotal);
        $bedtotal = session($bedtotal);
        $mealtotal = session($mealtotal);
        $finaltotal = session($finaltotal);
        $data = array('id'=>$id,'Name'=>$Name,'roomtype'=>$roomtype,'bed'=>$bed,'cin'=>$cin,'cout'=>$cout,'noofdays'=>$noofdays,'noofroom'=>$noofroom,'Meal'=>$Meal,'roomtotal'=>$roomtotal,'bedtotal'=>$bedtotal,'mealtotal'=>$mealtotal,'finaltotal'=>$finaltotal);
        DB::table('Payment')->insert($data);
        return redirect()->back()->with('success', 'Payment Added Successfully');
    }

    public function _show()
    {
        return view('Admin/Payment.blade.php');
    }

    public function _migrate(){
        $data = DB::table('Payment')->get();
        return view('Admin/Invoice.blade.php',['data'=>$data]);

    }
}