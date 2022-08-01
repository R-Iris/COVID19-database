<?php
use Illuminate\Support\Facades\Session;
?>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<div class="topnav">
    <br>
    <br>
    Welcome
    @if (Session::get('user'))
        <span style="color: rgba(0,255,255,0.55)"> <?= Session::get('user')['firstName'] . ' ' . Session::get('user')['lastName']; ?> </span>
        <td><a style="padding: 5px 10px; background: rgba(255,0,0,0.45); float: right; " data-method="post" class="button is-outlined" href="{{route('logout_controller')}}" onclick="return confirm('Are you sure to want to logout?')">Logout</a></td>
        <br>
    @else
        guest
    @endif

    <br>
    <br>

    @if (Session::get('user'))
        @if  (Session::get('user')['role'] != 'user')
        <a style="background: #395e78"  href="articles/new_article"">Add article</a>
        <a style="background: #395e78"  href="users"> List of users</a>
        @endif
        <a style="background: #395e78"  href="countries_and_prostaters">List of countries and ProStaTer</a>

        <br>
        <br>

        <a style="background: #395e78"  href="organizations">List of organizations</a>
    @endif
</div>

<br>
<br>
<br>


    @foreach($articles as $articleNumber => $article)
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

                <br>
                <br>

                <div>
                    @if (Session::get('user') && Session::get('user')['role'] != 'user')
                        <a href="articles/<?= $article['articleID'];?>/edit" class="btn btn-default">Edit</a>
                        <td><a data-method="post" class="button is-outlined" href="{{route('delete_article_controller',['articleID' => $article['articleID']])}}" onclick="return confirm('Are you sure to want to delete this article?')">Delete</a></td>
                    @endif
                </div>
            </div>
        </article>
    @endforeach
</body>
