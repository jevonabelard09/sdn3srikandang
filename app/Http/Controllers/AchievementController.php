<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->take(30)
            ->get();

        $stats = [
            'total' => $achievements->count(),
            'juara_1' => $achievements->filter(fn ($a) => preg_match('/^juara\\s*1\\b/i', (string) $a->title))->count(),
            'provinsi' => $achievements->filter(fn ($a) => str_contains(mb_strtolower((string) $a->subtitle), 'provinsi'))->count(),
            'tahun_aktif' => (int) date('Y'),
        ];

        return view('pages.prestasi', compact('achievements', 'stats'));
    }
}
