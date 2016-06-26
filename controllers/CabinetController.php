<?php


class CabinetController {
    
    public function actionIndex() {
        $userId = User::checkLogged();
        require_once(ROOT . '/views/cabinet.php');
        return true;
    }
    
    public function actionEdit() {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        extract($user);
        
        if (isset($_POST['edit'])) {
            extract($_POST);
            $result = User::edit($userId, $email, $password, $fio, $address, $telephone);
        }
        
        require_once(ROOT . '/views/user_edit.php');
        
        return true;
    }
}
