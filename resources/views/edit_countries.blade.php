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
        <h1>Update data for country with ID <?= $country->first()['countryID'] ?></h1>
    </div>
    <form action="{{ route('country_update_controller', ['countryID' => $country->first()['countryID']]) }}" method="post">
        @csrf
        <div class="info">
            <input class="fname" type="text" name="regionID" placeholder="<?= $country->first()['regionID'] ?>">
            <input type="text" name="name" placeholder="<?= $country->first()['name'] ?>">
            <input type="text" name="govID" placeholder="<?= $country->first()['govID'] ?>">
        </div>
        <button type="submit" href="/">Submit</button>
    </form>
</div>
</body>

