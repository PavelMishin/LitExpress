<?php

class MainController {
    
    public function actionIndex() {
        
        $newsList = array();
        $newsList = News::getNumberOfNews(3);
        
        $categoriesList = array();
        $categoriesList = Categories::getCategoriesList();
        
        require_once(ROOT . '/views/main.php');
        return true;
    }
    
    public function actionFeedback() {
        $name = '';
        $email = '';
        $result = false;
        if (isset($_SESSION['user'])) {
            $user = User::getUserById($_SESSION['user']);
            $name = User::getName($user['fio']);
            $email = $user['email'];
        }
        
        if (isset($_POST['feedback'])) {
            $name = $_POST['name'];
            $email = $_POST['e-mail'];
            $to = 'litexpress@gmail.com';
            $subject = $name . ', ' . $email;
            $message = $_POST['text'];
            $result = mail($to, $subject, $message);
            $result = true;
        }
        
        require_once(ROOT . '/views/feedback.php');
        return true;
    }
    
    public function actionDelivery() {
        require_once(ROOT . '/views/delivery.php');
        return true;
    }
    
    public function actionAbout() {
        require_once(ROOT . '/views/about.php');
        return true;
    }
    
    public function actionContacts() {
        require_once(ROOT . '/views/contacts.php');
        return true;
    }
    
    public function actionCall() {
        if (isset($_POST['telephone'])) {
            $email = 'litexpress16@gmail.com';
            $subject = 'Заказан звонок';
            $message = 'телефон: ' . $_POST['telephone'] . '; время: ' . $_POST['time'] 
                    . '; имя: ' . $_POST['name'];
            $result = mail($email, $subject, $message);
            $message = 'Ожидайте звонка!';
        }
            
        require_once(ROOT . '/views/call.php');
        return true;
    }
}
?>