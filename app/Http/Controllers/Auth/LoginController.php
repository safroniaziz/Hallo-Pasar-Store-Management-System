<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request){
        $input = $request->all();
        $messages = [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus berisi email yang valid.',
        ];
        $attributes = [
            'email'    =>  'email',
            'password'    =>  'Password',
        ];
        $this->validate($request,[
            'email' =>  'required|email',
            'password' =>  'required',
        ],$messages,$attributes);

        if (auth()->attempt(array('email'   =>  $input['email'], 'password' =>  $input['password']))) {
            if (Auth::check()) {
                if (auth()->user()->tipe_user == "admin") {
                    $notification1 = array(
                        'message' => 'Berhasil, anda login sebagai administrator',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('admin.dashboard')->with($notification1);
                }elseif (auth()->user()->tipe_user == "pelanggan") {
                    $notification1 = array(
                        'message' => 'Yeay, anda berhasil login',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('home')->with($notification1);
                }
            } else {
                return redirect()->route('login')->with('error','Gagal, password atau username salah');
            }
        }else{
            return redirect()->route('login')->with('error','Gagal, password atau username salah');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
