<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            background-color: #46576C;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            height: 100VH;
        }

        form {
            width: 20%;
            height: 50%;
            background-color: #2A81A9;
            display: flex;
            margin-bottom: 50px;
            justify-content: space-around;
            flex-direction: column;
            align-items: center;
            border: solid 2px #000;
        }

        form>input {
            padding: 15px;
        }

        form>a {
            color: #ADCCDB;
            text-decoration: none;
            transition: 500ms;

        }

        form>a:hover {
            color: #fff;

            text-decoration: none;
            transition: 500ms;

        }

        .submit {
            margin: 15px 15px 15px 15px;
            background-color: #ADCCDB;
            font-weight: 600;
            transition: 500ms;

        }

        .submit:hover {
            cursor: pointer;

            background-color: white;
            transition: 500ms;


        }
    </style>
</head>

<body>

    <img src="{{ asset('img/candy01.jpg') }}" alt="">
    <form action="/login" method="POST">
        <h1>LOGIN</h1>
        @csrf
        {{ Session::get('msg') ?? '' }}
        <input type="email" name="email" placeholder="email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input class="submit" type="submit" value="Login" />
        <a href="/register" class="">Create a Account</a>
    </form>
</body>
