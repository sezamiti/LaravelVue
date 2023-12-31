<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::allPaginate(10);
        return view('app.article.index', compact('articles'));
    }
    public function show($slug) {
        $article = Article::findBySlug($slug);
        return view('app.article.show', compact('article'));
    }

    public function allByTag(Tag $tag) {
        $articles = $tag->articles()->findByTag();
        return view('app.article.byTag', compact('articles'));
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return redirect()->back()->with('error', 'Новость не найдена');
        }

        // Удаление новости
        $article->delete();

        return redirect()->route('home')->with('success', 'Новость успешно удалена');
    }
}
