<?php

class CartController {
    
    public function actionIndex() {
        $goodsInCart = false;
        if (isset($_SESSION['goods']))
            $goodsInCart = $_SESSION['goods'];
        else
            $goodsInCart = false;
        
        if ($goodsInCart) {
            $goodsIds = array_keys($goodsInCart);
            $cartList = array();
            $i = 0;
            foreach ($goodsIds as $id) {
                $cartList[$i] = Books::getBookById($id);
                $i++;
            }
            $totalPrice = Cart::getTotalPrice($cartList);
        }
        require_once(ROOT . '/views/cart.php');
        return true;
    }
    
    public function actionAdd($id) {
        echo Cart::addInCart($id);
        return true;
    }
    
    public function actionCount() {
        echo Cart::countGoods();
        return true;
    }
    
    public function actionCheckout() {
        if (isset($_POST['checkout'])) {
            $email = $_POST['e-mail'];
            $fio = $_POST['fio'];
            $address = $_POST['address'];
            $telephone = $_POST['telephone'];
            $comment = $_POST['comment'];
            $goodsInCart = $_SESSION['goods'];
            
            if (isset($_SESSION['user']))
                $userId = $_SESSION['user'];
            else 
                $userId = false;
            
            $result = Order::save($userId, $fio, $email, $address, $telephone, $comment, $goodsInCart);
            
            if ($result) {
                mail('litexpress16@gmail', 'Новый заказ', 'Получен новый заказ!');
                unset($_SESSION['goods']);
                header("Location: /cart");
            }

        } else {
            if (isset($_SESSION['goods']) && !empty($_SESSION['goods']))
                $goodsInCart = $_SESSION['goods'];
            else
                header("Location: /cart");
            
            $goodsIds = array_keys($goodsInCart);
            $cartList = array();
            $i = 0;
            foreach ($goodsIds as $id) {
                $cartList[$i] = Books::getBookById($id);
                $i++;
            }
            $totalPrice = Cart::getTotalPrice($cartList);
            $totalQuantity = Cart::countGoods();
            
            $email = '';
            $fio = '';
            $address = '';
            $telephone = '';

            if (isset($_SESSION['user'])) {
                $user = User::getUserById($_SESSION['user']);
                $email = $user['email'];
                $fio = $user['fio'];
                $address = $user['address'];
                $telephone = $user['telephone'];
            }
        }
        
        
        require_once(ROOT . '/views/checkout.php');
        return true;
    }
    
    public function actionDelete($id) {
        if (isset($_SESSION['goods'][$id]))
            unset($_SESSION['goods'][$id]);
        
        header("Location: /cart");
    }
}
