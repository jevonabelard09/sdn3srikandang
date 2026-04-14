<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('achievements')) {
            return view('admin.migrations_missing', [
                'table' => 'achievements',
                'title' => 'Prestasi',
            ]);
        }

        $achievements = Achievement::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.achievements.index', compact('achievements'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:10'],
            'image' => [
                'nullable',
                'image',
                'max:5120',
                'mimes:jpg,jpeg',
            ],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'image.mimes' => 'Foto harus berupa gambar JPEG (.jpg / .jpeg).',
            'image.image' => 'Foto harus berupa file gambar yang valid.',
        ]);

        $payload = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'] ?? null,
            'icon' => $data['icon'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];

        if (Schema::hasColumn('achievements', 'image_path') && $request->hasFile('image')) {
            $payload['image_path'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($payload);

        return redirect()->route('admin.achievements.index')->with('status', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:10'],
            'image' => [
                'nullable',
                'image',
                'max:5120',
                'mimes:jpg,jpeg',
            ],
            'remove_image' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'image.mimes' => 'Foto harus berupa gambar JPEG (.jpg / .jpeg).',
            'image.image' => 'Foto harus berupa file gambar yang valid.',
        ]);

        $payload = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'] ?? null,
            'icon' => array_key_exists('icon', $data) ? ($data['icon'] ?? null) : $achievement->icon,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => (bool) ($data['is_active'] ?? false),
        ];

        if (Schema::hasColumn('achievements', 'image_path')) {
            if ($request->boolean('remove_image') && $achievement->image_path) {
                Storage::disk('public')->delete($achievement->image_path);
                $payload['image_path'] = null;
            }

            if ($request->hasFile('image')) {
                if ($achievement->image_path) {
                    Storage::disk('public')->delete($achievement->image_path);
                }

                $payload['image_path'] = $request->file('image')->store('achievements', 'public');
            }
        }

        $achievement->update($payload);

        return redirect()->route('admin.achievements.index')->with('status', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        if (Schema::hasColumn('achievements', 'image_path') && $achievement->image_path) {
            Storage::disk('public')->delete($achievement->image_path);
        }

        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('status', 'Prestasi berhasil dihapus.');
    }
}


