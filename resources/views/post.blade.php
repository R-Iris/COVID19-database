<!doctype html>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<article>
    <h1><?= $post->title; ?></h1>
    <div>
        <?= $post->body; ?>
    </div>

</article>
<a href="/COVID19-database/public/index.php">Go Back</a>
</body>
