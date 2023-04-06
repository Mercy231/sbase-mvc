<?php
session_start();
require ("../app/header.php");
?>
<body>
    <h1>Login</h1>
    <h2><a href="index.php">home</a></h2>
    <h2><a href="register.php">register</a></h2>
    <form id="form-login" method="post">
        <label>username: </label>
        <input id="username" type="text" minlength="4" required>
        <label>password: </label>
        <input id="password" type="password" minlength="6" required>
        <button id="login" type="submit">Log in</button>
        <p id="show-errors"></p>
    </form>

    <script>
        $("#form-login").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '/app/controllers/UserController.php',
                type: 'post',
                dataType: 'html',
                data: {
                    request: 'login',
                    username: $("#username").get(0).value,
                    password: $("#password").get(0).value,
                },
                success: function(response){
                    response = JSON.parse(response)
                    if (response.success) {
                        console.log('LOG IN SUCCESS')
                        window.location.href = 'index.php'
                    } else {
                        console.log('LOG IN FAIL')
                        $("#show-errors").text(response.error)
                    }
                }
            });
        });
    </script>
</body>
</html>
