<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('mitra.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('mitra.posts.create');
    }

    public function store(Request $request)
    {
        Post::create([
            'mitra_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'jurusan' => $request->jurusan,
            'is_active' => true,
            'lokasi' => $request->lokasi
        ]);

         return redirect()->back()->with('success', 'Postingan berhasil ditambahkan');
    }


     public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->mitra_id !== auth()->id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus');
    }

    // Menampilkan form edit
    public function edit($id) 
    {
        $post = Post::findOrFail($id);
        return view('mitra.post.edit', compact('post'));
    }


    // Update postingan
    public function update(Request $request, $id) 
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->lokasi = $request->lokasi;
        $post->jurusan = $request->jurusan;
        $post->save();

        return redirect('/mitra/dashboard')->with('success', 'Post berhasil diupdate!');
    }

}

