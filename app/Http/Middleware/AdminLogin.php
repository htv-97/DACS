<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminLogin
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->role === 'admin')
                return $next($request);

        }
        else
        return redirect()->route('login-signup')->with(['errorAdminLogin'=>'error','message'=>'Bạn không có quyền admin!']);    }
}
