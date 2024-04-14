<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Room extends Controller{

    public function _room()
    {
        return view('Admin/Room.blade.php');
    }

    public function _store(Request $typeofroom ,Request $typeofbed)
    {
        $typeofroom = $typeofroom->input('troom');
        $typeofbed = $typeofbed->input('bed');
        $data = array('troom'=>$typeofroom,'bed'=>$typeofbed);
        DB::table('Room')->insert($data);
        return redirect()->back()->with('success', 'Room Added Successfully');
    }

    public function _delete(Request $type,Request $bedding,Request $id)
    {
        $type = $type->input('type');
        $bedding = $bedding->input('bedding');
        $id = $id->session()->get('id');
        $data = array('type'=>$type,'bedding'=>$bedding ,'id'=>$id);
        DB::table('Room')->where('id',$id)->delete($data);
        return redirect()->back()->with('success', 'Room Deleted Successfully');
    }

}
