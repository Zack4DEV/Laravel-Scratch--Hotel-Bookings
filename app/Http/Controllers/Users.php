<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Users extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application User or Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function _users()
    {
        $role = auth()->user()->role;

        if ($role === config('constants.ROLE_ADMIN') && $request->is(config('admin.prefix') . '*')) {
            return property_exists($this, 'redirectTo') ? $this->redirectTo : "/dashboard";
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : "/home";
    }



    public function _logout()
    {
        Auth::logout();
        return redirect('/');
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

}
