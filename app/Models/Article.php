<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

   // Model is not timestamped
   public $timestamps  = false;

   public function getAll(): Collection
   {
       return Article::all();
   }

   public function findArticleByArticleID(int $articleID): Collection
   {
       return Article::where('articleID', $articleID)->get();
   }
}