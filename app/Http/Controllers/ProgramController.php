<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Facades\Schema;

class ProgramController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('programs')) {
            return view('pages.program', [
                'programs' => collect(),
            ]);
        }

        $programs = Program::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('pages.program', compact('programs'));
    }
}
