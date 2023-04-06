<?php
session_start();
require ("../app/header.php");
?>
<body>
    <h1>register</h1>
    <h2><a href="index.php">home</a></h2>
    <h2><a href="login.php">login</a></h2>
    <form id="form-register" method="post">
        <label>username: </label>
        <input id="username" type="text" minlength="4" required>
        <label>password: </label>
        <input id="password" type="password" minlength="6" required>
        <button id="register" type="submit">Register</button>
        <p id="show-errors"></p>
    </form>

    <script>
        $("#form-register").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '/app/controllers/UserController.php',
                type: 'post',
                dataType: 'html',
                data: {
                    request: 'register',
                    username: $("#username").get(0).value,
                    password: $("#password").get(0).value,
                },
                success: function(response){
                    response = JSON.parse(response)
                    if (response.success) {
                        console.log('REG SUCCESS')
                        window.location.href = 'index.php'
                    } else {
                        console.log('REG FAIL')
                        console.log(response)
                        $("#show-errors").text(response.error)
                    }
                }
            });
        });
    </script>
</body>
</html>
