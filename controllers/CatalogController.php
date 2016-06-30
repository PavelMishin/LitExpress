<?php

class CatalogController {
    
    public function actionIndex($page = 1) {
        Pagination::getCapacity();
        $categories = array();
        $categories = Categories::getCategoriesList();
        $subCategories = array();
        $subCategories = Categories::getSubCategoriesList();
        $books = array();
        $books = Books::getBooksList($page);
        
        $total = Books::getTotalBooks();
        
        $pagination = new Pagination($total, $page, $_SESSION['capacity'], 'page-');
        require_once(ROOT . '/views/catalog.php');
        return true;
    }
    
    public function actionBook($id) {
        $categories = array();
        $categories = Categories::getCategoriesList();
        $subCategories = array();
        $subCategories = Categories::getSubCategoriesList();
        $comments = array();
        $comments = Books::getComments($id);
        if ($id) {
            $book = Books::getBookById($id);
            
            require_once(ROOT . '/views/book.php');
        }
        
        return true;
    }
    

    public function actionAddComment($book, $user) {
        $date = date("d-m-Y H:i", time());
        if (isset($_POST['comment'])) {
            $comment = $_POST['comment'];
            Books::addComment($book, $user, $comment, $date);
        }
        $comments = array();
        $comments = Books::getComments($book);
        return include(ROOT . '/views/layouts/comments.php');
    }
    
    public function actionBooksBySubCategory($category, $subCategory, $page = 1) {
        Pagination::getCapacity();
        $categories = array();
        $categories = Categories::getCategoriesList();
        $subCategories = array();
        $subCategories = Categories::getSubCategoriesList();
        $books = array();
        $books = Books::getBooksListBySubCategory($category, $subCategory, $page);
        
        $total = Books::getTotalBooksInSubCategory($subCategory);
        
        $pagination = new Pagination($total, $page, $_SESSION['capacity'], 'page-');
      
        require_once(ROOT . '/views/catalog.php');
        return true;
    }
    
    public function actionBooksByCategory($category, $page = 1) {
        Pagination::getCapacity();
        $categories = array();
        $categories = Categories::getCategoriesList();
        $subCategories = array();
        $subCategories = Categories::getSubCategoriesList();
        $books = array();
        $books = Books::getBooksListByCategory($category, $page);
        
                
        $total = Books::getTotalBooksInCategory($category);
        
        $pagination = new Pagination($total, $page, $_SESSION['capacity'], 'page-');
        
        require_once(ROOT . '/views/catalog.php');
        return true;
    }
    
    public function actionSearch() {
        if (isset($_POST['search'])) {
            $searchQuery = $_POST['search'];
            $books = Books::searchBooks($searchQuery);
            $total = Books::getTotalBooksBySearchQuery($searchQuery);
            $categories = Categories::getCategoriesList();
            $subCategories = Categories::getSubCategoriesList();
            $category = false;
            
            require_once(ROOT . '/views/search_result.php');
        }
        
        return true;
    }
}
