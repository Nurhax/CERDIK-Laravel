<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERDIK-LoginAdmin</title>
    <link rel="stylesheet" href="{{asset('css/adminStyles/LoginAdmin.css')}}" type="text/css">
    <script>
        const routes = {
            adminMenu: @json(route('adminMenu'))
        };
    </script>
</head>
<body>
    <div class="SquareLogin">
        <div class="LoginText">
            <h1>Admin Login</h1>
        </div>
        <div class="InputForm">
            <h2>Username</h2>
            <input type="text" style="height: 25px;" id="Username">
            <br>
            <h2>Password</h2>
            <input type="password" style="height: 25px;" id="Password">
            <div class="LoginButton">
            <button type="button" style="font-size: 25px; border: none; border-radius: 5px; color: #2569FF;" onclick="HideLogin()">LOGIN</button>
            </div>
        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/adminScripts/Admin.js')}}"></script>
</body>
</html>