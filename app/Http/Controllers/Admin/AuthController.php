<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show(Request $request)
    {
        if ($request->session()->get('admin_authenticated') === true && $request->session()->has('admin_user_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adminUser = User::query()
            ->where('email', $data['email'])
            ->where('is_admin', true)
            ->first();

        if (! $adminUser || ! Hash::check($data['password'], $adminUser->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);
        $request->session()->put('admin_user_id', $adminUser->id);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_user_id']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-admin');
    }
}
