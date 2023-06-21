<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = DB::table('users')->where('name', $name)->first();

        if ($user && $user->password === $password) {
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_id', $user->id);
            return redirect()->intended('/recipes');
        }
        return redirect()->back()->withErrors([
            'message' => 'Invalid username or password.',
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user_name');
        $request->session()->forget('user_id');

        return redirect('/login');
    }
}
