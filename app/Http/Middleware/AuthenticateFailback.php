<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateFailback extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */

    protected function redirectTo($request): string
    {
            if (!  $request->is(config('admin.prefix') . '*' ) || !$request->is(config('user.prefix'),'*') ) {
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
        }
    }

}