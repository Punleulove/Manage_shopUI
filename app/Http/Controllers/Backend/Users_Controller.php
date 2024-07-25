<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users_Controller extends Controller
{
    public function OpenRegister()
    {
        return view('Backend.register');
    }
    public function Register(Request $request)
    {
        $username = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $profile = $request->profile;

        if ($profile) {
            $new_prolfile = date('dmyhis') . '_' . $profile->getClientOriginalName();
            $path = 'Images';
            $profile->move($path, $new_prolfile);
        }

        try {
            DB::table('users')->insert([
                'name' => $username,
                'email' => $email,
                'password' => $password,
                'profile' => $new_prolfile,
            ]);

            return redirect('/login');
        } catch (Exception $e) {
            return redirect('/register')->with('unsuccess', $e->getMessage());
        }
    }

    public function OpenLogin()
    {
        return view('Backend.login');
    }
    public function Login(Request $request)
    {
        if (
            Auth::attempt([
                'name' => $request->name_email,
                'password' => $request->password,
            ])
        ) {
            return redirect('/admin/')->with('success');
        } else if (
            Auth::attempt([
                'email' => $request->name_email,
                'password' => $request->password,
            ])
        ) {
            return redirect('/')->with('success');
        } else {
            return redirect('/login')->with('unsuccess', '');
        }
    }



    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
