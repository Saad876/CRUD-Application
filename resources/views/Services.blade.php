<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 style="color:red">Services</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem magnam nulla odit fugit, excepturi nihil id cumque, officiis ipsa cupiditate, vel asperiores voluptas distinctio eligendi. Ipsam molestias, quidem esse a obcaecati libero adipisci illo iusto neque beatae vitae, rerum aspernatur corrupti et cum consectetur sunt veniam tenetur excepturi incidunt dolorum!</p>
    </div>
    <div>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/about') }}" style="margin-left: 20px;">About</a>
        <a href="{{ url('/contact') }}" style="margin-left: 20px;">Contact</a>
        <a href="{{ url('/services') }}" style="margin-left: 20px;">Services</a>
    </div>
</body>
</html>