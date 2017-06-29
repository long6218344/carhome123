<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class SignMiddleware
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

            $name = DB::table('bbs_user_info')->pluck('username')->toArray();
            if (
            in_array($request->input('username'),$name)
        ) {
            return redirect('home/sign');
        }else{
//                var_dump($name);
                return $next($request);
        }

    }
}
