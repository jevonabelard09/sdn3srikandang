<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $requiredTables = [
            'gallery_images' => 'Galeri',
            'teachers' => 'Guru',
            'programs' => 'Program',
            'achievements' => 'Prestasi',
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
        ];

        return view('admin.dashboard', compact('stats'));
    }
}