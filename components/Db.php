<?php

class Db {
    
    public static function getConnection() {
        $db = new PDO("mysql:host=localhost; dbname=y92936ku_books; charset=utf8", 'y92936ku_books', 'kykish123');
        return $db;
    }
}
