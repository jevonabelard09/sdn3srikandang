<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('programs')) {
            return view('admin.migrations_missing', [
                'table' => 'programs',
                'title' => 'Program',
            ]);
        }

        $programs = Program::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => [
                'nullable',
                'image',
                'max:5120',
                'mimes:jpg,jpeg,png,webp',
            ],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'image.mimes' => 'Gambar harus berupa file JPG/JPEG/PNG/WEBP.',
            'image.image' => 'Gambar harus berupa file gambar yang valid.',
        ]);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            if (! Schema::hasColumn('programs', 'image_path')) {
                return back()
                    ->withErrors(['image' => 'Fitur gambar program belum aktif. Jalankan php artisan migrate terlebih dahulu.'])
                    ->withInput();
            }

            $payload['image_path'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($payload);

        return redirect()->route('admin.programs.index')->with('status', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => [
                'nullable',
                'image',
                'max:5120',
                'mimes:jpg,jpeg,png,webp',
            ],
            'remove_image' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'image.mimes' => 'Gambar harus berupa file JPG/JPEG/PNG/WEBP.',
            'image.image' => 'Gambar harus berupa file gambar yang valid.',
        ]);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => (bool) ($data['is_active'] ?? false),
        ];

        if (Schema::hasColumn('programs', 'image_path')) {
            if ($request->boolean('remove_image') && $program->image_path) {
                Storage::disk('public')->delete($program->image_path);
                $payload['image_path'] = null;
            }

            if ($request->hasFile('image')) {
                if ($program->image_path) {
                    Storage::disk('public')->delete($program->image_path);
                }

                $payload['image_path'] = $request->file('image')->store('programs', 'public');
            }
        } elseif ($request->hasFile('image') || $request->boolean('remove_image')) {
            return back()
                ->withErrors(['image' => 'Fitur gambar program belum aktif. Jalankan php artisan migrate terlebih dahulu.'])
                ->withInput();
        }

        $program->update($payload);

        return redirect()->route('admin.programs.index')->with('status', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if (Schema::hasColumn('programs', 'image_path') && $program->image_path) {
            Storage::disk('public')->delete($program->image_path);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')->with('status', 'Program berhasil dihapus.');
    }
}