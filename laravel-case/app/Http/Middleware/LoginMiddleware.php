<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;

use Closure;

class LoginMiddleware
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
       if(empty($_SESSION['uid'])){

           return redirect('/home/login');
       }

       
        return $next($request);//通过了检测,进行下一步操作
    }
}
