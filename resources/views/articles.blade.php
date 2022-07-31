<?php
use Illuminate\Support\Facades\Session;
?>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<div class="topnav">
    Welcome
    @if (Session::get('user'))
        <span style="color: rgba(0,255,255,0.55)"> <?= Session::get('user')['firstName'] . ' ' . Session::get('user')['lastName']; ?> </span>
    @else
        guest
    @endif

    <br>
    <br>

    @if (Session::get('user'))
        <a style="background: #395e78"  href="#contact">Add article</a>
        <a style="background: #395e78"  href="users"> List of users</a>
        <a style="background: #395e78"  href="#contact">List of countries</a>
    @endif
</div>

<br>
<br>


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
