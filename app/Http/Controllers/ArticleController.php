<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use App\Models\Article;

class ArticleController extends Controller
{

    public function dashboard()
    {

        // Get all of the articles associated with the current user.
        $std = Article::all();

        // Return the view, passing in the articles array.
        //eager loading in laravel (with)
        return view('articles.dashboard')->with(['articles' => $std]);
    }

    public function updatearticle($article)
    {
        $std = Article::find($article);
        if (!$std) {
            // Handle the case when the article is not found
            abort(404);
        }

        return view('articles.update')->with('article', $std);
    }



    public function updatedArticle(Request $request, $articleID)
    {
        $std = Article::find($articleID);

        $std->title = $request->get('title');
        $std->image = $request->get('image');
        $std->content = $request->get('content');
        $std->category_id = $request->get('category_id');
        $std->user_id = $request->get('user_id');

        $std->save();

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $article = Article::destroy($id);

        return redirect()->route('dashboard');
    }



    public function articleRead($article)
    {
        $std = Article::find($article);

        if (!$std) {
            abort(404);
        }

        $comments = Comment::where('article_id', $std)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('articles.read')->with(['article' => $std, 'comments' => $comments]);
    }



    public function createArticle(Request $request)
    {
        $std = new Article();

        $std->title = $request->get('title');
        $std->image = $request->get('image');
        $std->content = $request->get('content');
        $std->category_id = $request->get('category_id');
        $std->user_id = $request->get('user_id');

        $std->save();

        return redirect()->route('dashboard');
    }
    public function loadCreatepage()
    {
        return view('articles.createpage');
    }
}
