<!doctype html>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <a href="posts/<?= $post->slug;?>"><?= $post->title; ?></a>

            <div>
                <?= $post->excerpt; ?>
            </div>
        </article>
    <?php endforeach; ?>
</body>
