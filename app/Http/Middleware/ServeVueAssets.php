<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;

class ServeVueAssets
{
    public function handle($request, Closure $next)
    {
        $uri = $request->path();
        $filePath = public_path('build/assets/' . $uri);

        if (File::exists($filePath)) {
        return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
