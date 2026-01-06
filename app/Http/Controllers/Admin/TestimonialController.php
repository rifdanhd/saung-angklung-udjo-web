<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::latest();

        if ($request->has('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        $testimonials = $query->paginate(20);

        return view('admin.testimonials.index', compact('testimonials'));
    }
    public function create()
    {
        // Menampilkan form tambah testimoni
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'country'    => 'nullable|string|max:100',
            'rating'     => 'required|integer|min:1|max:5',
            'message'    => 'required|string',
            'is_approved' => 'boolean',
        ]);

        // Simpan testimoni
        Testimonial::create($validated);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => true]);

        return back()->with('success', 'Testimoni berhasil disetujui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
