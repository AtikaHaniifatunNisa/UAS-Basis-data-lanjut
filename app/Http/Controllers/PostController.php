<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    try {
        // Validasi input
        // Generate slug dari judul
        $slug = Str::slug($request->title);

        // Upload gambar jika ada
        $imageName = 'Noimage.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('path/to/images'), $imageName); // Ganti path dengan folder yang sesuai
        }

        // Simpan data ke database
        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'image' => $imageName,
            'hits' => 0, // Nilai default
            'aktif' => 'Y', // Nilai default
            'status' => $request->status,
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat.');
    } catch (\Exception $e) {
        // Redirect ke halaman create dengan pesan error
        return redirect()->route('posts.create')->with('error', 'Gagal menyimpan postingan: ' . $e->getMessage());
    }
}




    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|max:200',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:publish,draft',
        ]);

        $slug = Str::slug($request->title); // Menghasilkan slug dari judul

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('path/to/images'), $imageName); // Ganti dengan path yang sesuai
            $post->image = $imageName; // Update nama gambar
        }

        $post->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'status' => $request->status,
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}