<?php
use Illuminate\Support\Facades\Session;
?>
<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<br>

@if  (Session::get('user')['role'] != 'user')
    <a style="background: #395e78"  href="organizations/new_organization">Add organization</a>
@endif
<a href="/COVID19-database/public/articles">Go Back</a>

<br>
<br>


    @foreach($organizations as $organization)
        <article>
            <h3>Organization with ID: <span style="color: rgba(0,255,255,0.55)"> <?= $organization['orgID']; ?> </span></h3>
            <br>
            <?= $organization['name']; ?>
            <br>

            <div>
                <br>
                <br>

                <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $organization['type']; ?></span>

                <br>
                <br>
                <br>

                @if  (Session::get('user')['role'] != 'user')
                    <a href="organizations/<?= $organization['orgID'];?>/edit" class="btn btn-default">Edit</a>
                    <td><a data-method="post" class="button is-outlined" href="{{route('delete_organization_controller',['orgID' => $organization['orgID']])}}" onclick="return confirm('Are you sure to want to delete this organization?')">Delete</a></td>
                @endif
            </div>
        </article>
    @endforeach
</body>
