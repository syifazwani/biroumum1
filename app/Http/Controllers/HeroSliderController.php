<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::latest()->get();
        return view('admin.hero-slider.index', compact('sliders'));
    }


    public function showHome()
    {
        $sliders = HeroSlider::latest()->get();
        return view('home', compact('sliders'));
    }

    public function showGallery()
    {
        $sliders = HeroSlider::latest()->get();
        return view('galeri.foto', compact('sliders'));
    }

    public function create()
    {
        return view('admin.hero-slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image_path')->store('hero', 'public');

        HeroSlider::create([
            'image_path' => $path,
        ]);

        return redirect()->route('hero-slider.index')->with('success', 'Gambar slider berhasil ditambahkan.');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        // Hapus file gambar dari storage
        if ($heroSlider->image_path && Storage::disk('public')->exists($heroSlider->image_path)) {
            Storage::disk('public')->delete($heroSlider->image_path);
        }

        $heroSlider->delete();

        return redirect()->route('hero-slider.index')->with('success', 'Gambar slider berhasil dihapus.');
    }

    public function edit(HeroSlider $heroSlider)
    {
        return view('admin.hero-slider.edit', compact('heroSlider'));
    }

    public function update(Request $request, HeroSlider $heroSlider)
    {
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($heroSlider->image_path && Storage::disk('public')->exists($heroSlider->image_path)) {
                Storage::disk('public')->delete($heroSlider->image_path);
            }

            // Simpan gambar baru
            $path = $request->file('image_path')->store('hero', 'public');
            $heroSlider->update(['image_path' => $path]);
        }

        return redirect()->route('hero-slider.index')->with('success', 'Gambar slider berhasil diperbarui.');
    }

}
