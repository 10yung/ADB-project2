<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        if($user->userType == 'Member'){
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
