<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // crud
    // create
    // read (done)
    // update
    // delete
    // filter
    // search
    public function __construct(Post $post)
    {
        $this->post = $post; // Inisialisasi properti post dalam konstruktor
    }
    public function index()
    {
        $posts = $this->post->all(); // Mengambil semua data post
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png|max:2048',
            'nama' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'required|max:2000',
        ]);

        // Simpan gambar ke direktori penyimpanan (storage/app/public)
        $gambarPath = $request->file('gambar')->store('public/gambar');

        // Simpan data ke dalam database
        $post = new Post();
        $post->gambar = basename($gambarPath);
        $post->nama = $request->nama;
        $post->stok = $request->stok;
        $post->berat = $request->berat;
        $post->harga = $request->harga;
        $post->kondisi = $request->kondisi;
        $post->deskripsi = $request->deskripsi;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit($id) {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png|max:2000',
            'nama' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'required|max:2000',
        ]);
        $post = Post::findOrFail($id);
        $post->gambar = $request->gambar;
        $post->nama = $request->nama;
        $post->stok = $request->stok;
        $post->berat = $request->berat;
        $post->harga = $request->harga;
        $post->kondisi = $request->kondisi;
        $post->deskripsi = $request->deskripsi;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function delete(Request $request, $id) {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
