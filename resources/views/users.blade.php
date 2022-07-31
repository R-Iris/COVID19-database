<?php
use Illuminate\Support\Facades\Session;
?>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<div class="topnav">
    Welcome
    @if (Session::get('user'))
        <?= Session::get('user')['firstName'] . ' ' . Session::get('user')['lastName']; ?>
    @else
        guest
    @endif

    <br>
    <br>

    @if (Session::get('user'))
        <a style="background: #395e78" href="#home">Edit my profile</a>
        <a style="background: #395e78"  href="#contact">Add article</a>
        <a style="background: #395e78"  href="#contact">List of users</a>
        <a style="background: #395e78"  href="#contact">List of countries</a>
    @endif
</div>

<br>

<a style="background: #395e78"  href="users/new_user">Add user</a>
<a href="/COVID19-database/public/articles">Go Back</a>

<br>
<br>


    @foreach($users as $user)
        <article>
            <h3>User with ID: <span style="color: rgba(0,255,255,0.55)"> <?= $user['userID']; ?> </span></h3>
            <br>
            <?= $user['firstName'] . ' ' . $user['lastName']; ?>
            <br>
            Belongs to the organization with ID: <?= $user['orgID']; ?>
            <br>
            Is citizen of the country with ID: <?= $user['citizenship']; ?>

            <div>
                <br>
                <br>

                <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $user['role']; ?></span>

                <br>
                <br>

                <h4>Personal information</h4>
                User's phone number: <?= $user['phone']; ?>
                <br>
                User's email: <?= $user['email']; ?>
                <br>
                User's birthdate: <?= $user['birthDate']; ?>

                <br>
                <br>
                <br>

                <a href="users/<?= $user['userID'];?>/edit" class="btn btn-default">Edit</a>
                <td><a data-method="post" class="button is-outlined" href="{{route('delete_user_controller',['userID' => $user['userID']])}}" onclick="return confirm('Are you sure to want to delete this user?')">Delete</a></td>
            </div>
        </article>
    @endforeach
</body>
