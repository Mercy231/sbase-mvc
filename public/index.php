<?php
session_start();
require ("../app/header.php");
?>
<body>
    <h1>Home page</h1>
    <?php if ($_SESSION): ?>
        <h2>Welcome, <?php echo $_SESSION['username'] ?></h2>
        <button id="logout">Log out</button>
    <?php else: ?>
        <h2><a href="login.php">Login</a> | <a href="register.php">Register</a></h2>
    <?php endif; ?>

    <script>
        $("#logout").click(function(e){
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
