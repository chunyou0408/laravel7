<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        //判斷是否是admin,如果是damin,就next

        // $user = Auth::user();
        // $role = $user->type;

        if(Auth::user()==''){

        }


        if(Auth::user()->type != 'admin'){
            // return redirect('/');
            abort(404);
        }
        return $next($request);

    }
}
