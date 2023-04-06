<?php
class Validator
{
    static function validate ($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        return htmlspecialchars($data);
    }
    static function validate_username ($username)
    {
        $username = self::validate($username);
        if (mb_strlen($username) < 4) {
            return false;
        }
        return  $username;
    }
    static function validate_password ($password)
    {
        $password = self::validate($password);
        if (mb_strlen($password) < 6) {
            return false;
        }
        return  $password;
    }
}