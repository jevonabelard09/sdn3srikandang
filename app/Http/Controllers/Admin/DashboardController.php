<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $hasContactMessageReadAtColumn = Schema::hasColumn('contact_messages', 'read_at');

        $requiredTables = [
            'gallery_images' => 'Galeri',
            'teachers' => 'Guru',
            'programs' => 'Program',
            'achievements' => 'Prestasi',
            'contact_messages' => 'Kontak',
        ];

        foreach ($requiredTables as $table => $title) {
            if (! Schema::hasTable($table)) {
                return view('admin.migrations_missing', [
                    'table' => $table,
                    'title' => 'Dashboard',
                ]);
            }
        }

        $stats = [
            'gallery' => (int) DB::table('gallery_images')->count(),
            'teachers' => (int) DB::table('teachers')->count(),
            'programs' => (int) DB::table('programs')->count(),
            'achievements' => (int) DB::table('achievements')->count(),
            'contact_messages' => (int) DB::table('contact_messages')->count(),
            'unread_contact_messages' => $hasContactMessageReadAtColumn
                ? (int) DB::table('contact_messages')->whereNull('read_at')->count()
                : 0,
            'supports_read_status' => $hasContactMessageReadAtColumn,
        ];

        $latestContactMessages = ContactMessage::query()
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestContactMessages'));
    }
}
