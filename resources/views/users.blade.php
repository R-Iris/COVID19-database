<?php
use Illuminate\Support\Facades\Session;
?>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<br>

<a style="background: #395e78"  href="users/new_user">Add user</a>
<a href="/COVID19-database/public/articles">Go Back</a>

<br>
<br>


    @foreach($users as $user)
        <article>
            <h3>User with ID: <span style="color: rgba(0,255,255,0.55)"> <?= $user['userID']; ?> </span></h3>
            <br>

            @if ($user->isUserSuspended($user['userID']) != 0)
                <span style="color: red;">Suspended</span>
            @endif

            <br>
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
                @if ($user->isUserSuspended($user['userID']) != 0)
                    <td><a style="background: #4b783a" data-method="post" class="button is-outlined" href="{{route('user_activate_controller',['userID' => $user['userID']])}}" onclick="return confirm('Are you sure to want to activate this user?')">Activate</a></td>
                @else
                    <td><a data-method="post" class="button is-outlined" href="{{route('user_suspend_controller',['userID' => $user['userID']])}}" onclick="return confirm('Are you sure to want to suspend this user?')">Suspend</a></td>
                @endif
                <td><a data-method="post" class="button is-outlined" href="{{route('delete_user_controller',['userID' => $user['userID']])}}" onclick="return confirm('Are you sure to want to delete this user?')">Delete</a></td>
            </div>
        </article>
    @endforeach
</body>
