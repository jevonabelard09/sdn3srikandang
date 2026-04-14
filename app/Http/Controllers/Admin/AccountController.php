<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function edit(Request $request)
    {
        $adminUser = $this->currentAdmin($request);

        return view('admin.account', compact('adminUser'));
    }

    public function update(Request $request)
    {
        $adminUser = $this->currentAdmin($request);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($adminUser->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $adminUser->name = $data['name'];
        $adminUser->email = $data['email'];

        if (! empty($data['password'])) {
            $adminUser->password = $data['password'];
        }

        $adminUser->save();

        return back()->with('status', 'Akun admin berhasil diperbarui.');
    }

    private function currentAdmin(Request $request): User
    {
        $adminUserId = $request->session()->get('admin_user_id');

        return User::query()
            ->whereKey($adminUserId)
            ->where('is_admin', true)
            ->firstOrFail();
    }
}
