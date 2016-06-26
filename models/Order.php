<?php

class Order {
    
    public static function save($userId, $fio, $email, $address, $telephone, $comment, $goodsInCart) {
        $goodsInCart = json_encode($goodsInCart);
        
        $db = Db::getConnection();
        
        $query = 'INSERT INTO orders (user_id, fio, email, address, phone_number, comment, cart)'
                . ' VALUES (:user_id, :fio, :email, :address, :phone_number, :comment, :cart)';
        
        $result = $db->prepare($query);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':fio', $fio, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':phone_number', $telephone, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':cart', $goodsInCart, PDO::PARAM_STR);
        
        $result->execute();
        return true;
    }
    
    public static function getOrders() {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM orders ORDER BY date DESC');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['fio'] = $row['fio'];
            $orders[$i]['email'] = $row['email'];
            $orders[$i]['address'] = $row['address'];
            $orders[$i]['phone_number'] = $row['phone_number'];
            $orders[$i]['comment'] = $row['comment'];
            $orders[$i]['cart'] = $row['cart'];
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['status'] = $row['status'];
            $i++;
        }
        return $orders;
    }
    
    public static function countOrders() {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) as count FROM orders');
        return $result->fetch()['count'];
    }
    
    public static function changeStatus($id, $status) {
        $db = Db::getConnection();
        $result = $db->query('UPDATE orders SET status = ' . $status . ' WHERE id = ' . $id);
        return $result;
        
    }
}
