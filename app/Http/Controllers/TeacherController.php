<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Schema;

class TeacherController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('teachers')) {
            return view('pages.guru', [
                'teachers' => collect(),
            ]);
        }

        $teachers = Teacher::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.guru', compact('teachers'));
    }
}