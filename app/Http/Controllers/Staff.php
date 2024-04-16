<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Staff extends Controller{

    public function _staff()
    {
        return view('Admin/Staff.blade.php');
    }

    public function _store()
    {
        $staffname = $staffname->input('staffname');
        $staffwork = $staffwork->input('staffwork');
        $data = array('staffname'=>$staffname,'staffwork'=>$staffwork);
        DB::table('staff')->insert($data);
        return redirect()->back()->with('success', 'Staff Added Successfully');
    }

    public function _delete()
    {
        $name = $name->input('name');
        $work = $work->input('work');
        $id = $id->session()->get('id');
        $data = array('name'=>$name,'work'=>$work ,'id'=>$id);
        DB::table('staff')->where('id',$id)->delete($data);
        return redirect()->back()->with('success', 'Staff Deleted Successfully');
    }

}
