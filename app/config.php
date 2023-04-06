<?php

const DB_DSN = 'mysql:host=localhost;dbname=sbase-study-task01';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

function db_connect() {
    return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}