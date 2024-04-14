<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller{


public function _logout()
{

    Auth::logout();
    return redirect('/');
}

public function _show()
    {
        return view('Admin/Dashboard.blade.php');
    }

public function _migrate()
    {
        return view('Admin/Exportdata.blade.php');
    }

}
