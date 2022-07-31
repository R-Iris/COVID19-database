<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #1a202c;
            color: #cbd5e0;
            max-width: 600px;
            margin: auto;
            font-family: sans-serif;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #36425d;
            box-sizing: border-box;
            border-radius: 10px;
        }

        button, a {
            border-radius: 25px;
            background-color: rgba(4, 170, 109, 0.56);
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
        }

        button:hover, a:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .container {
            padding: 16px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
            border-radius: 25px;
        }

        .modal-content {
            background-color: #415070;
            margin: 5% auto 15% auto;
            border: 1px solid rgba(58, 62, 120, 0.32);
            width: 80%;
            border-radius: 25px;
        }

        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        @media screen and (max-width: 300px) {
            .cancelbtn {
                width: 100%;
            }
        }

        .alert {
            padding: 20px;
            background-color: rgba(244, 67, 54, 0.62);
            border-radius: 10px;
            color: white;
            margin-bottom: 15px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>
<body>
<title>COVID19 Database</title>

<h2> COVID-19 Non-Profit Health Organization</h2>

@if($errors->any())
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{$errors->first()}}
    </div>
@endif

<button onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>
<a href="/COVID19-database/public/articles" style="width:auto;" onclick="<?= Session::forget('user'); ?>">Visit as a guest</a>

<div id="login" class="modal">

    <form class="modal-content animate" action="{{ route('login_controller') }}" method="post">
        @csrf
        <div class="container">
            <label for="userID"><b>User ID</b></label>
            <input type="text" placeholder="Enter User ID" name="userID" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#36425d; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
            <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>

<script>
    var modal = document.getElementById('login');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
