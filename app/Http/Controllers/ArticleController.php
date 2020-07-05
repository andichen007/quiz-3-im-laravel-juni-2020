<?php

namespace App\Http\Controllers;

use App\{Article, Tag};
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('artikel.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('artikel.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('artikel.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $attr = $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $attr['slug'] = \Str::slug($attr['title']);
        $post = Article::create($attr);
        $post->tags()->attach($request->tags);


        return back()->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $tags = Tag::all();

        return view('artikel.edit', compact('article', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $attr = $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $article = Article::find($id);
        $article->tags()->sync($request->tags);
        $article->update($attr);

        return back()->with('success', 'Artikel berhasil diubah.');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->delete();

        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
