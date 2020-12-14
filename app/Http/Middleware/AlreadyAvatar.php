<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;

use Closure;

class AlreadyAvatar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->avatar_choosen_at){
            return $request->expectsJson()
            ? abort(403, 'Avatar already chooser')
            : Redirect::route('welcome' ?: 'verification.notice');
        }
        return $next($request);
    }
}
