<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [
                'required' => 'string',
                Rule::exists('admins')->where('status', true)
            ],
            'password' => 'required|string',
        ],
            $this->validationError()
        );
    }
    // custom  error
    protected function validationError(){
        return
            [
                $this->username() . '.exists' => 'this email is invalid or you need to activate your account!'
            ];
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'))->with('status', 'Logout Successfully');
    }
}
