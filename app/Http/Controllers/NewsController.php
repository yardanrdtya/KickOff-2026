<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;

        $news = News::with('category')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('judul', 'like', "%{$keyword}%");
            })
            ->orderBy('tanggal_terbit', 'desc')
            ->get();

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'required|image',
            'author' => 'required',
            'tanggal_terbit' => 'required',
        ]);

        $gambar = $request->file('gambar')->store('news', 'public');

        News::create([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'isi_berita' => $request->isi_berita,
            'gambar' => $gambar,
            'author' => $request->author,
            'tanggal_terbit' => $request->tanggal_terbit,
        ]);

        return redirect()->route('news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();

        return view('news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'judul' => 'required'
        ]);

        $news->update([
            'judul' => $request->judul
        ]);

        return redirect()->route('news.index')
            ->with('success', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
