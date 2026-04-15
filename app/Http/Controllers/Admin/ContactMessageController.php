<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        if (! Schema::hasTable('contact_messages')) {
            return view('admin.migrations_missing', [
                'table' => 'contact_messages',
                'title' => 'Kontak Management',
            ]);
        }

        $supportsReadStatus = Schema::hasColumn('contact_messages', 'read_at');

        $messages = ContactMessage::query()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $selectedMessage = null;

        if ($request->filled('message')) {
            $selectedMessage = ContactMessage::query()->find($request->query('message'));

            if ($supportsReadStatus && $selectedMessage && $selectedMessage->read_at === null) {
                $selectedMessage->forceFill(['read_at' => now()])->save();
                $selectedMessage->refresh();
            }
        }

        return view('admin.contact_messages.index', compact('messages', 'selectedMessage', 'supportsReadStatus'));
    }

    public function show(ContactMessage $contactMessage): RedirectResponse
    {
        if (Schema::hasColumn('contact_messages', 'read_at') && $contactMessage->read_at === null) {
            $contactMessage->forceFill(['read_at' => now()])->save();
        }

        return redirect()->route('admin.contact-messages.index', ['message' => $contactMessage->id]);
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        if (! Schema::hasColumn('contact_messages', 'read_at')) {
            return redirect()
                ->route('admin.contact-messages.index', ['message' => $contactMessage->id])
                ->with('status', 'Status baca belum tersedia. Jalankan php artisan migrate untuk mengaktifkannya.');
        }

        $data = $request->validate([
            'action' => ['required', 'in:read,unread'],
        ]);

        $contactMessage->forceFill([
            'read_at' => $data['action'] === 'read' ? now() : null,
        ])->save();

        $status = $data['action'] === 'read'
            ? 'Pesan ditandai sudah dibaca.'
            : 'Pesan ditandai belum dibaca.';

        return redirect()
            ->route('admin.contact-messages.index', ['message' => $contactMessage->id])
            ->with('status', $status);
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('status', 'Pesan kontak berhasil dihapus.');
    }
}
