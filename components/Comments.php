<?php

/**
 * Description of Comments
 */
class Comments {
    
    public static function commentsView($id) {
        $comments = array();
        $comments = Books::getComments($id);
        $comentViews = include(ROOT. '/views/layouts/comments.php');
        return $comentViews;
    }
    
}
