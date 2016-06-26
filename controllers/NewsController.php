<?php

class NewsController {
    
    public function actionIndex() {
        
        $newsList = array();
        $newsList = News::getNewsList();
        
        require_once(ROOT . '/views/news.php');
        return true;
    }
        
}
?>