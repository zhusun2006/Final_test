<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
			$message = $request->is('signup') ? '尊敬的用户请勿重复注册！' : '您已登陆，无需再次操作';
            session()->flash('info', $message);
            $user_id = User::where('id', Auth::id())->value('id');
            return redirect()->route('users.show',$user_id);
        }

        return $next($request);
    }
}
