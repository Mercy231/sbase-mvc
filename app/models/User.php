<?php
require_once ('../config.php');
class User
{
    static function register($username, $password)
    {
        try {
            $pdo = db_connect();
            $sql = 'INSERT INTO Users (username, password) VALUES (:username, :password)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username, 'password' => md5($password)]);
            return ['success' => true];
        } catch (PDOException $e){
            return ['success' => false, 'error' => 'Username already exist'];
        }
    }
    static function login ($username, $password)
    {
        try {
            $pdo = db_connect();
            $sql = 'SELECT * FROM Users WHERE username = :username';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetchAll();
            if ($user && $user[0]['password'] == md5($password)) {
                return ['success' => true];
            } else {
                return ['success' => false, 'error' => 'Invalid username or password'];
            }
        } catch (PDOException $e){
            return ['success' => false, 'error' => $e];
        }
    }
}