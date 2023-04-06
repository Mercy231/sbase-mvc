<?php
$url = $_SERVER['REQUEST_URI'];
$title = explode('/', $url);
$title = stristr(end($title), '.', true);
if ($title === 'index') {
    $title = 'home';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../public/js/functions.js"></script>
    <title><?php echo $title ?></title>
</head>