<!doctype html>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<article>
    <h1>Article #<?= $article->first()['articleID']; ?></h1>
    <div>
        <?= $article->first()['summary']; ?>

        <br>
        <br>

            <a href="<?= $article->first()['link']; ?>">View full article</a>
    </div>

</article>

<br>
<br>
<br>

<a href="/COVID19-database/public/articles">Go Back</a>
</body>
