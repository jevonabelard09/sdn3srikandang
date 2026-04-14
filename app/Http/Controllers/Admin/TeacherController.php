<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('teachers')) {
            return view('admin.migrations_missing', [
                'table' => 'teachers',
                'title' => 'Data Guru',
            ]);
        }

        $teachers = Teacher::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:150'],
            'nip' => ['nullable', 'string', 'max:50'],
            'gender' => ['nullable', 'in:L,P'],
            'photo' => [
                'nullable',
                'file',
                'max:5120',
                'extensions:jpg,jpeg,jfif,png,webp,gif',
                function ($attribute, $value, $fail) {
                    if ($value && @getimagesize($value->getRealPath()) === false) {
                        $fail('Foto harus berupa gambar yang valid (JPG/PNG/WebP/GIF).');
                    }
                },
            ],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('teachers', 'public');
        }

        $payload = [
            'name' => $data['name'],
            'role' => $data['role'] ?? null,
            'nip' => $data['nip'] ?? null,
            'photo_path' => $photoPath,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];

        if (Schema::hasColumn('teachers', 'gender')) {
            $payload['gender'] = $data['gender'] ?? null;
        }

        Teacher::create($payload);

        return redirect()->route('admin.teachers.index')->with('status', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:150'],
            'nip' => ['nullable', 'string', 'max:50'],
            'gender' => ['nullable', 'in:L,P'],
            'photo' => [
                'nullable',
                'file',
                'max:5120',
                'extensions:jpg,jpeg,jfif,png,webp,gif',
                function ($attribute, $value, $fail) {
                    if ($value && @getimagesize($value->getRealPath()) === false) {
                        $fail('Foto harus berupa gambar yang valid (JPG/PNG/WebP/GIF).');
                    }
                },
            ],
            'remove_photo' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $photoPath = $teacher->photo_path;

        if (! empty($data['remove_photo']) && $photoPath) {
            Storage::disk('public')->delete($photoPath);
            $photoPath = null;
        }

        if ($request->hasFile('photo')) {
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('teachers', 'public');
        }

        $payload = [
            'name' => $data['name'],
            'role' => $data['role'] ?? null,
            'nip' => $data['nip'] ?? null,
            'photo_path' => $photoPath,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_active' => (bool) ($data['is_active'] ?? false),
        ];

        if (Schema::hasColumn('teachers', 'gender')) {
            $payload['gender'] = $data['gender'] ?? null;
        }

        $teacher->update($payload);

        return redirect()->route('admin.teachers.index')->with('status', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo_path) {
            Storage::disk('public')->delete($teacher->photo_path);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('status', 'Data guru berhasil dihapus.');
    }
}