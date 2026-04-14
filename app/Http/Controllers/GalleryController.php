<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::query()
            ->orderBy('sort_order')
            ->latest()
            ->take(30)
            ->get();

        return view('pages.galeri', compact('images'));
    }
}