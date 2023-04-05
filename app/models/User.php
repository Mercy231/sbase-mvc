<?php
class User
{
    static function register($username, $password)
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=sbase-study-task01", "root", "");
            $pdo->query('INSERT INTO Users (username, password) VALUES ("'.$username.'", "'.$password.'")');
            return ['success' => true];
        } catch (PDOException $e){
            return ['success' => false, 'error' => $e];
        }
    }
    static function login ($username, $password)
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=sbase-study-task01", "root", "");
            $user = $pdo->query('SELECT * FROM Users WHERE username="'.$username.'"')->fetchAll(PDO::FETCH_ASSOC);
            if ($user && $user[0]['password'] == $password) {
                return ['success' => true];
            } else {
                return ['success' => false, 'error' => 'Invalid username or password'];
            }
        } catch (PDOException $e){
            return ['success' => false, 'error' => $e];
        }
    }
}