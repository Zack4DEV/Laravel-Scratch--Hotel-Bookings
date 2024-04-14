<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @params \Illuminate\Http\Request $request 
     */
    protected function redirect(Request $request): routed
    {
        return $request->expectsJson() ? null : redirect('/');
    }
}