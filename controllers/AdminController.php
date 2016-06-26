<?php

class AdminController {
    
    public function actionIndex() {
        self::checkAdmin();
        require_once(ROOT . '/views/layouts/header_admin.php');
        return true;
    }
    
    public function actionGoods($page = 1) {
        self::checkAdmin();
        $_SESSION['capacity'] = 10;
        if (isset($_POST['capacity'])) {
            $_SESSION['capacity'] = $_POST['capacity'];
        }

        $books = array();
        $books = Books::getAdminBooksList($page);
        $total = Books::getTotalBooks();
        $pagination = new Pagination($total, $page, $_SESSION['capacity'], 'page-');
        
        require_once(ROOT . '/views/admin_goods.php');
        return true;
    }
    
    public function actionCreateGoods() {
        self::checkAdmin();
        $subCategories = Categories::getSubCategoriesList();
        if (isset($_POST['save'])) {
            $id = Books::addBook($_POST);
        }
        
        $book = array(
            'author' => '',
            'title' => '',
            'subCategory' => '',
            'year' => '',
            'ISBN' => '',
            'price' => '',
            'pages' => '',
            'publisher' => '',
            'description' => '');
        $heading = 'Добавление товара';
        
        require_once(ROOT . '/views/admin_item.php');
        return true;
    }
    
    public function actionUpdateGoods($id) {
        self::checkAdmin();
        $subCategories = Categories::getSubCategoriesList();
        $book = Books::getBookById($id);
        
        if (isset($_POST['save'])) {
            $result = Books::updateBook($id, $_POST);
        }
        
        $heading = 'Редактирование товара';
        
        require_once(ROOT . '/views/admin_item.php');
        return true;
    }

    public function actionDeleteGoods($id) {
        self::checkAdmin();
        
        if (isset($_POST['delete'])) {
            Books::deleteBookById($id);
            header("Location: /admin/goods");
        }

        require_once(ROOT . '/views/admin_delete.php');
        return true;
    }
    
    
    public function actionOrders() {
        self::checkAdmin();
        $orders = Order::getOrders();
        $total = Order::countOrders();
        $carts = array();
        for ($i = 0; $i < count($orders); $i++) {
            $orderId = $orders[$i]['id'];
            $carts[$orderId] = json_decode($orders[$i]['cart'], TRUE);
            foreach ($carts[$orderId] as $id => $value) {
                $count = $value;
                $carts[$orderId][$id] = Books::getBookById($id);
                $carts[$orderId][$id]['count'] = $count;
            }
        }
        require_once(ROOT . '/views/admin_orders.php');
        return true;
    }
    
    public function actionChangeOrderStatus($id, $status) {
        Order::changeStatus($id, $status);
        return true;
    }
    
    private static function checkAdmin() {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        if ($user['admin'] == true)
            return true;
        else
            die('<b>Доступ запрещён!</b><br><a href="/">Вернуться на главную</a>');
    }
}