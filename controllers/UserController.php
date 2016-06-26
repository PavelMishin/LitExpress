<?php

class UserController {
    
    public function actionRegistration() {
        $password = '';
        $email = '';
        $error = '';
        $register = false;
        if (isset($_POST['registration'])) {
            $password = $_POST['password'];
            $email = $_POST['e-mail'];
            
            switch (User::checkEmailExists($email)) {
                case true:
                $error = 'Такой e-mail уже используется';
                    break;
                case false:
                $register = User::register($email, $password);
                    break;
            }
        }

        
        require_once(ROOT . '/views/registration.php');
        
        return true;
    }
    
    public function actionLogin() {
        if (isset($_POST['password']) && isset($_POST['e-mail'])) {
            $password = $_POST['password'];
            $email = $_POST['e-mail'];

            $userId = User::checkUser($email, $password);

            if($userId == false) {
                $error = 'Неправильный e-mail или пароль <br> Попробуйте ещё раз';
                require_once(ROOT . '/views/login.php');
            } else {
                $message = 'Добро пожаловать на сайт!';
                User::auth($userId);
                $userId = User::checkLogged();
                $user = User::getUserById($userId);
//                header("Location: /user/cabinet/");
                require_once(ROOT . '/views/cabinet.php');
                die;
            }
        }

        require_once(ROOT . '/views/login.php');
        
        return true;
    }
    
    public function actionLogout() {
        unset($_SESSION['user']);
        header("location: /");
    }
    
    public function actionForgot() {
        if (isset($_POST['e-mail'])) {
            $email = $_POST['e-mail'];
            $password = User::remember($email);
            $subject = 'LitExpress. Напоминание пароля';
            $message = 'Ваш пароль на сайте LitExpress: ' . $password;
            $result = mail($email, $subject, $message);
            header('Location: /user/login');
        }
            
        require_once(ROOT . '/views/forgot.php');
        return true;
    }
    
}