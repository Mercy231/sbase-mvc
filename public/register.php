<?php
session_start();
var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <title>register</title>
</head>
<body>
    <h1>register</h1>
    <h2><a href="index.php">home</a></h2>
    <h2><a href="login.php">login</a></h2>
    <form method="post">
        <label>username: </label>
        <input type="text">
        <label>password: </label>
        <input type="text">
        <button type="submit">Submit</button>
    </form>

    <script>
        $("form").submit(function(e){
            e.preventDefault();
            console.log('start');
            $.ajax({
                url: '/app/controllers/UserController.php',
                type: 'post',
                dataType: 'html',
                data: {
                    request: 'register',
                    username: $("input").get(0).value,
                    password: $("input").get(1).value,
                },
                success: function(response){
                    console.log(response);
                    if (JSON.parse(response).success) {
                        console.log('LOG IN SUCCESS')
                        window.location.href = 'index.php'
                    } else {
                        console.log('LOG IN FAIL')
                    }
                }
            });
        });
    </script>
</body>
</html>
