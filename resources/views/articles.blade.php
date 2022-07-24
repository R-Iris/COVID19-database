<!doctype html>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
    @foreach($articles as $article)
        <article>
            <a href="articles/<?= $article['articleID'];?>">Article with ID: <?= $article['articleID']; ?></a>

            <div>
                <br>

                Written by user with ID <b><?= $article['author']; ?></b> on <em><?= $article['publicationDate']; ?></em>

                <br>
                <br>
                <br>

                <span class="label majorTopic"><?= $article['majorTopic']; ?></span>
                <span class="label minorTopic"><?= $article['minorTopic']; ?></span>

                <br>
                <br>

                <h4>Summary</h4>
                <?= $article['summary']; ?>
            </div>
        </article>
    @endforeach
</body>
