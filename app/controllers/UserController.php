<?php
session_start();

require_once ("../models/User.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'register':
            $request = User::register($_POST['username'], $_POST['password']);
            if ($request['success']) {
                $_SESSION['username'] = $_POST['username'];
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $request['error']]);
            }
            break;
        case 'login':
            $request = User::login($_POST['username'], $_POST['password']);
            if ($request['success']) {
                $_SESSION['username'] = $_POST['username'];
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'username' => $_POST['username'], 'error' => $request['error']]);
            }
            break;
        case 'logout':
            unset($_SESSION['username']);
            echo  json_encode(['success' => true]);
            break;
        default:
            echo json_encode('NOPE');
            break;
    }
}