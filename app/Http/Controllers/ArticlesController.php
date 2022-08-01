<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends BaseController
{
    function index()
    {
        return view('articles');
    }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'publicationDate' => 'filled',
            'author' => 'required|int',
            'majorTopic' => 'required',
            'minorTopic' => 'required',
            'summary' => 'required',
            'link' => 'required',
        ]);

        $article = (new Article)->findArticleByArticleID($request->get('articleID'))->first();

        $article->update([
            'publicationDate' => $request->input('publicationDate') ? $request->input('publicationDate') : $article['publicationDate'],
            'author' => $request->input('author') ? $request->input('author') : $article['author'],
            'majorTopic' => $request->input('majorTopic') ? $request->input('majorTopic') : $article['majorTopic'],
            'minorTopic' => $request->input('minorTopic') ? $request->input('minorTopic') : $article['minorTopic'],
            'summary' => $request->input('summary') ? $request->input('summary') : $article['summary'],
            'link' => $request->input('link') ? $request->input('link') : $article['link'],
        ]);

        return redirect('articles')->with('success', 'Article Updated');
    }

    public function delete(Request $request)
    {
        $article = (new Article)->findArticleByArticleID($request->input('articleID'))->first();

        DB::table('articlesRemoved')->insert([
            'articleID' => $article['articleID'],
            'suspendedDate' => Carbon::now(),
        ]);

        return redirect('articles')->with('success', 'Article Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'publicationDate' => 'filled',
            'author' => 'required|int',
            'majorTopic' => 'required',
            'minorTopic' => 'required',
            'summary' => 'required',
            'link' => 'required',
        ]);

        $articleID = [
            'articleID' => (new Article)->countAllArticles() + 1
        ];


        DB::table('articles')->insert(array_merge($articleID, $request->except(['_token'])));

        return redirect('articles')->with('success', 'Article Added');
    }
}
