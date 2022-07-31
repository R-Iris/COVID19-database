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
        <h1>Add a new ProStaTer</h1>
    </div>
    <form action="{{ route('prostater_add_controller') }}" method="post">
        @csrf
        <div class="info">
            <input class="fname" type="text" name="countryID" placeholder="Country ID">
            <input type="text" name="population" placeholder="Population">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="numInfected" placeholder="Number of people infected by COVID-19">
            <input type="text" name="numVax" placeholder="Number of people vaccinated against COVID-19">
            <input type="text" name="numInfectedUnVax" placeholder="Number of people infected and not vaccinated">
            <input type="text" name="covidDeaths" placeholder="Number of deaths due to COVID-19">
        </div>
        <button type="submit" href="/">Submit</button>
    </form>
</div>
</body>

