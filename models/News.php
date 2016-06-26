<?php

class News {
   
    // Возвращает все новости
    public static function getNewsList() {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT id, title, date, content FROM news ORDER BY date DESC');
        
        $i = 0;
        
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['content'] = $row['content'];
            $i++;
        }
        
        return $newsList;
    }
    
        public static function getNumberOfNews($count) {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT id, title, date, content FROM news ORDER BY date DESC LIMIT ' . $count);
        
        $i = 0;
        
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['content'] = $row['content'];
            $i++;
        }
        
        return $newsList;
    }
}
