<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'email|required', 'password' => 'required']);

        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $admin = Auth::guard('admin')->user();

            if ($admin->role != 2) {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('err', 'You are not an admin user');
            }

            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('err', 'Invalid Credentials');
        }
    }
}
