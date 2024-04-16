<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller{

public function _show()
    {
        return view('Admin/Dashboard');
    }


}