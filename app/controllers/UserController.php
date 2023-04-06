<?php
session_start();

require_once ("../models/User.php");
require_once ("../Validator.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'register':
            $username = Validator::validate_username($_POST['username']);
            $password = Validator::validate_password($_POST['password']);
            if (!$username) {
                echo json_encode(['success' => false, 'error' => 'Username min length - 4']);
                break;
            } elseif (!$password) {
                echo json_encode(['success' => false, 'error' => 'Password min length - 6']);
                break;
            }
            $request = User::register($username, $password);
            if ($request['success']) {
                $_SESSION['username'] = $_POST['username'];
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $request['error']]);
            }
            break;
        case 'login':
            $username = Validator::validate($_POST['username']);
            $password = Validator::validate($_POST['password']);
            $request = User::login($username,$password);
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