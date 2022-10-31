<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                if (auth()->user()->tipe_user == "admin") {
                    $notification1 = array(
                        'message' => 'Berhasil, anda login sebagai operator administrator',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('admin.dashboard')->with($notification1);;
                }elseif (auth()->user()->tipe_user == "operator_prodi") {
                    $notification1 = array(
                        'message' => 'Berhasil, anda login sebagai operator program studi!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('operator_prodi.dashboard')->with($notification1);;
                }elseif (auth()->user()->tipe_user == "operator_unit") {
                    $notification1 = array(
                        'message' => 'Berhasil, anda login sebagai operator unit!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('operator_unit.dashboard')->with($notification1);;
                }else {
                    Auth::logout();
                    return redirect()->route('login')->with(['error' =>  'NIP anda tidak terdaftar']);
                }
            }
        }

        return $next($request);
    }
}
