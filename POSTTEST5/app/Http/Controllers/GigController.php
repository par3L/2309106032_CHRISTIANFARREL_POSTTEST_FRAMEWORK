<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Gig;
use App\Models\Category;

class GigController extends Controller
{
    /**
     * tampilkan daftar gig
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Gig::with(['user', 'category'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('quickgigs.index', [
            'data' => $data,
            'title' => 'Browse Gigs',
            'search' => $search,
        ]);
    }

    /**
     * tampilkan form untuk membuat gig baru
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('quickgigs.create', [
            'title' => 'Create New Gig',
            'categories' => $categories,
        ]);
    }

    /**
     * simpan gig baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'delivery_time' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gig_images', 'public');
        }

        Gig::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'delivery_time' => $validated['delivery_time'],
            'image' => $imagePath,
            'is_active' => true,
        ]);

        return redirect()->route('gigs.my-gigs')->with('success', 'Gig berhasil dibuat!');
    }

    /**
     * tampilkan detail gig
     */
    public function show(Gig $gig)
    {
        $gig->load(['user', 'category', 'reviews.user']);
        
        return view('quickgigs.show', [
            'gig' => $gig,
            'title' => $gig->title,
        ]);
    }

    /**
     * tampilkan form untuk edit gig
     */
    public function edit(Gig $gig)
    {
        // cek apakah user pemilik gig ini
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::orderBy('name', 'asc')->get();
        
        return view('quickgigs.edit', [
            'title' => 'Edit Gig',
            'gig' => $gig,
            'categories' => $categories,
        ]);
    }

    /**
     * update gig di database
     */
    public function update(Request $request, Gig $gig)
    {
        // cek apakah user pemilik gig ini
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'delivery_time' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($gig->image) {
                Storage::disk('public')->delete($gig->image);
            }

            $imagePath = $request->file('image')->store('gig_images', 'public');
            $validated['image'] = $imagePath;
        }

        $gig->update($validated);

        return redirect()->route('gigs.my-gigs')->with('success', 'Gig berhasil diupdate!');
    }

    /**
     * hapus gig dari database
     */
    public function destroy(Gig $gig)
    {
        // cek apakah user pemilik gig ini
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // hapus gambar jika ada
        if ($gig->image) {
            Storage::disk('public')->delete($gig->image);
        }

        $gig->delete();

        return redirect()->route('gigs.my-gigs')->with('success', 'Gig berhasil dihapus!');
    }

    /**
     * tampilkan gig milik user yang sedang login
     */
    public function myGigs()
    {
        $data = Gig::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('quickgigs.my-gigs', [
            'data' => $data,
            'title' => 'My Gigs',
        ]);
    }
}
