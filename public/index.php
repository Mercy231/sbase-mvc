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
    <title>Home</title>
</head>
<body>
    <h1>Home page</h1>
    <?php if ($_SESSION): ?>
        <h2>Welcome, <?php echo $_SESSION['username'] ?></h2>
        <button>Log out</button>
    <?php else: ?>
        <h2><a href="login.php">Login</a> | <a href="register.php">Register</a></h2>
    <?php endif; ?>

    <script>
        $("button").click(function(e){
            $.ajax({
                url: '/app/controllers/UserController.php',
                type: 'post',
                dataType: 'html',
                data: {
                    request: 'logout',
                },
                success: function(response){
                    console.log(response);
                    if (JSON.parse(response).success) {
                        console.log('LOG OUT SUCCESS')
                        window.location.href = 'index.php'
                    } else {
                        console.log('LOG OUT FAIL')
                    }
                }
            });
        });
    </script>
</body>
</html>
