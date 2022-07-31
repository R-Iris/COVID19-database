<!doctype html>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<head>
    <style>
        h1, h2 {
            text-transform: uppercase;
            font-weight: 400;
        }
        h2 {
            margin: 0 0 0 8px;
        }
        .left-part, form {
            padding: 25px;
        }
        .left-part {
            text-align: center;
        }
        .fa-graduation-cap {
            font-size: 72px;
        }

        .info {
            display: flex;
            flex-direction: column;
        }
        input, select {
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #eee;
            color: #ffffff;
        }
        input::placeholder {
            color: #eee;
        }
        option:focus {
            border: none;
        }
        option {
            background: #ffffff;
            border: none;
        }

        button {
            width: 100%;
            border-radius: 25px;
            background: #415070;
            color: #eeeeee;
        }

        button:hover, .btn-item:hover {
            background: #85d6de;
        }

        @media (min-width: 568px) {
            html, body {
                height: 100%;
            }
            .main-block {
                flex-direction: row;
                height: calc(100% - 50px);
            }
            .left-part, form {
                flex: 1;
                height: auto;
            }
        }
    </style>
</head>
<body>
<div class="main-block">
    <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Update data for article with ID <?= $article->first()['articleID'] ?></h1>
    </div>
    <form action="{{ route('article_update_controller', ['articleID' => $article->first()['articleID']]) }}" method="post">
        @csrf
        <div class="info">
            <input class="fname" type="text" name="publicationDate" placeholder="<?= $article->first()['publicationDate'] ?>">
            <input type="text" name="author" placeholder="<?= $article->first()['author'] ?>">
            <input type="text" name="majorTopic" placeholder="<?= $article->first()['majorTopic'] ?>">
            <input type="text" name="minorTopic" placeholder="<?= $article->first()['minorTopic'] ?>">
            <input type="text" name="summary" placeholder="<?= $article->first()['summary'] ?>">
            <input type="text" name="link" placeholder="<?= $article->first()['link'] ?>">
        </div>
        <button type="submit" href="/">Submit</button>
    </form>
</div>
</body>

