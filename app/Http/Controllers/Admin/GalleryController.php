<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => [
                'required',
                'file',
                'max:5120',
                'extensions:jpg,jpeg,jfif,png,webp,gif',
                function ($attribute, $value, $fail) {
                    if (@getimagesize($value->getRealPath()) === false) {
                        $fail('File harus berupa gambar yang valid (JPG/PNG/WebP/GIF).');
                    }
                },
            ],
            'title' => ['nullable', 'string', 'max:150'],
            'category' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:100000'],
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'path' => $path,
            'title' => $data['title'] ?? null,
            'category' => $data['category'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        return redirect()->route('admin.gallery.index')->with('status', 'Gambar berhasil ditambahkan.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        if ($galleryImage->path) {
            Storage::disk('public')->delete($galleryImage->path);
        }

        $galleryImage->delete();

        return redirect()->route('admin.gallery.index')->with('status', 'Gambar berhasil dihapus.');
    }
}