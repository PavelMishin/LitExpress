<?php

class Cart {
    
    public static function addInCart($id) {
        $id = intval($id);
        
        $goodsInCart = array();
        
        if (isset($_SESSION['goods'])) {
            $goodsInCart = $_SESSION['goods'];
        }
        
        if (array_key_exists($id, $goodsInCart)) {
            $goodsInCart[$id] ++;
        } else {
            $goodsInCart[$id] = 1;
        }
        
        $_SESSION['goods'] = $goodsInCart;
        
        return self::countGoods();
    }
    
    public static function countGoods() {
        if (isset($_SESSION['goods'])) {
            $count = 0;
            foreach ($_SESSION['goods'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    
    public static function getTotalPrice($cartList) {
        
        if (isset($_SESSION['goods']))
            $goodsInCart = $_SESSION['goods'];
        else
            $goodsInCart = false;
        
        $total = 0;
        if ($goodsInCart) {
            foreach ($cartList as $item) {
                $total += $item['price'] * $goodsInCart[$item['id']];           
            }
        }
        return $total;
    }
}
