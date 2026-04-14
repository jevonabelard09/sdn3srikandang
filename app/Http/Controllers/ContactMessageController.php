<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        if (! Schema::hasTable('contact_messages')) {
            return back()->withErrors([
                'message' => 'Database belum siap. Jalankan php artisan migrate terlebih dahulu.',
            ])->withInput();
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['nullable', 'string', 'max:255'], // honeypot
        ]);

        if (! empty($data['website'] ?? null)) {
            return back()->with('status', 'Pesan berhasil dikirim.');
        }

        ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('status', 'Pesan berhasil dikirim. Terima kasih!');
    }
}

