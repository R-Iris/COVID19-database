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
        <h1>Update data for user with ID <?= $user->first()['userID'] ?></h1>
    </div>
    <form action="{{ route('user_update_controller', ['userID' => $user->first()['userID']]) }}" method="post">
        @csrf
        <div class="info">
            <input class="fname" type="text" name="firstName" placeholder="<?= $user->first()['firstName'] ?>">
            <input type="text" name="lastName" placeholder="<?= $user->first()['lastName'] ?>">
            <input type="text" name="orgID" placeholder="<?= $user->first()['orgID'] ?>">
            <input type="text" name="citizenship" placeholder="<?= $user->first()['citizenship'] ?>">
            <input type="text" name="email" placeholder="<?= $user->first()['email'] ?>">
            <input type="text" name="phone" placeholder="<?= $user->first()['phone'] ?>">
            <input type="text" name="role" placeholder="<?= $user->first()['role'] ?>">
            <input type="text" name="birthDate" placeholder="<?= $user->first()['birthDate'] ?>">
            <input type="text" name="password" placeholder="<?= $user->first()['password'] ?>">
        </div>
        <button type="submit" href="/">Submit</button>
    </form>
</div>
</body>

