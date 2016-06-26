<?php

class User {
    public static function register($email, $password) {
        $db = Db::getConnection();
        $query = 'INSERT INTO users (email, password) VALUES (:email, :password)';
        
        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }

    public static function checkEmailExists($email) {
        $db = Db::getConnection();
        $query = 'SELECT COUNT(*) FROM users WHERE email = :email';
        
        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())
            return true;
        return false;
    }
    
    public static function checkUser($email, $password) {
        $db = Db::getConnection();
        
        $query = 'SELECT * FROM users WHERE email = :email AND password = :password';
        
        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        
        $user = $result->fetch();
        if($user) {
            return $user['id'];
        }
        return false;
    }
    
    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            $_SESSION['message'] = 'Авторизируйтесь';
            header("location: /user/login");
        }
    }
    
    public static function getUserById($id) {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM users WHERE id = ' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch();
    }
    
    public static function edit($id, $email, $password, $fio, $address, $telephone) {
        $db = Db::getConnection();
        $query = 'UPDATE users SET email = :email, password = :password, fio = :fio, '
                . 'address = :address, telephone = :telephone WHERE id = :id';
        
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':fio', $fio, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getName($fio) {
        if (!empty($fio)) {
            $fioArray = explode(' ', $fio);
        $name = $fioArray[1];
       
        return $name;
        }
        
    }
    
    public static function remember($email) {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT password FROM users WHERE email = "' . $email . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch()['password'];
    }
}
