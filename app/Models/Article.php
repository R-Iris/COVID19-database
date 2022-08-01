<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    public $articleID;
    public $publicationDate;
    public $author;
    public $majorTopic;
    public $minorTopic;
    public $summary;
    public $link;

   protected $table = 'articles';
   protected $primaryKey = 'articleID';

    protected $fillable = [
        'articleID',
        'publicationDate',
        'author',
        'majorTopic',
        'minorTopic',
        'summary',
        'link',
    ];

   // Model is not timestamped
   public $timestamps  = false;

   public function getAll(): Collection
   {
       $articlesRemovedID = DB::table('articlesRemoved')->pluck('articleID')->all();

       return Article::whereNotIn('articleID', $articlesRemovedID)->select('*')->get();
   }

   public function findArticleByArticleID(int $articleID): Collection
   {
       return Article::where('articleID', $articleID)->get();
   }

    public function countAllArticles(): int
    {
        return Article::all()->count();
    }

    public function addToArticlesRemoved(int $articleID)
    {
        return DB::table('articlesRemoved')->insert([
            'articleID' => $articleID,
        ]);
    }
}
