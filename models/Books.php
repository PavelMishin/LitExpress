<?php

class Books {
    
    public static function getBooksList($page) {
        $page = intval($page);
        $offset = ($page - 1) * $_SESSION['capacity'];
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT id, title, author, price, date FROM books ORDER BY date DESC' . 
                ' LIMIT ' . $_SESSION['capacity'] . ' OFFSET ' . $offset);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['author'] = $row['author'];
            $booksList[$i]['price'] = $row['price'];
            
            $i++;
        }
        
        return $booksList;
    }
    
    public static function getAdminBooksList($page) {
        $page = intval($page);
        $offset = ($page - 1) * $_SESSION['capacity'];
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT books.id, title, author, price, date, rus, availability'
                . ' FROM books, sub_categories WHERE sub_category_id = sub_categories.id'
                . ' ORDER BY title ASC LIMIT ' . $_SESSION['capacity'] . ' OFFSET ' . $offset);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['author'] = $row['author'];
            $booksList[$i]['price'] = $row['price'];
            $booksList[$i]['subcategory'] = $row['rus'];
            $booksList[$i]['availability'] = $row['availability'];
            $i++;
        }
        
        return $booksList;
    }
    
    public static function getBookById($id) {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM books WHERE id =' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $book = $result->fetch();
        
        $subCategory = $db->query('SELECT eng FROM books, sub_categories '
                . 'WHERE sub_categories.id = ' . $book['sub_category_id']);
        $book['subCategory'] = $subCategory->fetch()[0];
        
        $category = $db->query('SELECT categories.eng as eng FROM sub_categories,'
                . ' categories WHERE sub_categories.eng = "' . $book['subCategory'] 
                . '" and parent_id = categories.id');
        $book['category'] = $category->fetch()[0];
        return $book;
    }
    
    public static function getBooksListBySubCategory($category, $subCategory, $page) {
        $page = intval($page);
        $offset = ($page - 1) * $_SESSION['capacity'];
        
        $db = Db::getConnection();
        $result = $db->query('SELECT books.id as idBook, title, author, price, date ' .
                'FROM books, sub_categories WHERE sub_category_id = sub_categories.id' .
                ' and eng = "' . $subCategory . '" LIMIT ' . $_SESSION['capacity'] .
                ' OFFSET ' . $offset);
                
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['idBook'];
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['author'] = $row['author'];
            $booksList[$i]['price'] = $row['price'];
            
            $i++;
        }
        
        return $booksList;
    }
    
        public static function getBooksListByCategory($category, $page) {
        
        $page = intval($page);
        $offset = ($page - 1) * $_SESSION['capacity'];
            
        $db = Db::getConnection();
        $result = $db->query('SELECT books.id as idBook, title, author, price, date ' .
                'FROM books, sub_categories, categories' .
                ' WHERE sub_category_id = sub_categories.id and parent_id = categories.id' .
                ' and categories.eng = "' . $category . '" LIMIT ' . $_SESSION['capacity'] .
                ' OFFSET ' . $offset);
                
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['idBook'];
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['author'] = $row['author'];
            $booksList[$i]['price'] = $row['price'];
            
            $i++;
        }
        
        return $booksList;
    }
    
    public static function getTotalBooks() {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) as count FROM books');
        return $result->fetch()['count'];
        
    }
    
    public static function getTotalBooksInCategory($category) {
        
        $db = Db::getConnection();
        $result = $db->query('SELECT count(books.id) as count' .
                ' FROM books, sub_categories, categories' .
                ' WHERE sub_category_id = sub_categories.id and parent_id = categories.id' .
                ' and categories.eng = "' . $category . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch()['count'];
    }
    
    public static function getTotalBooksInSubCategory($subCategory) {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(books.id) as count' .
                ' FROM books, sub_categories' .
                ' WHERE sub_category_id = sub_categories.id' .
                ' and sub_categories.eng = "' . $subCategory . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch()['count'];
    }
    
    public static function getTotalBooksBySearchQuery($query) {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(books.id) as count '
                . 'FROM books WHERE title = "' . $query . '" or author = "'
                . $query . '" or year = "' . $query . '" or publisher = "' . $query . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch()['count'];
    }
    
    public static function addBook($book) {
        $db = Db::getConnection();
        
        $query = 'INSERT INTO books ( title, author, sub_category_id, year,'
                . ' ISBN, price, pages, description, publisher) VALUES (:title,'
                . ' :author, :sub_category_id, :year, :ISBN, :price, :pages, :description, :publisher)';
        
        $result = $db->prepare($query);
        $result->bindParam(':title', $book['title'], PDO::PARAM_STR);
        $result->bindParam(':author', $book['author'], PDO::PARAM_STR);
        $result->bindParam(':sub_category_id', $book['subcategory'], PDO::PARAM_INT);
        $result->bindParam(':year', $book['year'], PDO::PARAM_INT);
        $result->bindParam(':ISBN', $book['isbn'], PDO::PARAM_STR);
        $result->bindParam(':price', $book['price'], PDO::PARAM_INT);
        $result->bindParam(':pages', $book['pages'], PDO::PARAM_INT);
        $result->bindParam(':description', $book['description'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $book['publisher'], PDO::PARAM_STR);
        $result->execute();
        
        return $db->lastInsertId();
    }
    
    public static function updateBook($id, $book) {
        $db = Db::getConnection();
        
        $query = 'UPDATE books SET title = :title, author = :author, '
                . 'sub_category_id = :sub_category_id, year = :year, '
                . 'ISBN = :ISBN, price = :price, pages = :pages, '
                . 'description = :description, publisher = :publisher '
                . 'WHERE id = :id';
        
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':title', $book['title'], PDO::PARAM_STR);
        $result->bindParam(':author', $book['author'], PDO::PARAM_STR);
        $result->bindParam(':sub_category_id', $book['subcategory'], PDO::PARAM_INT);
        $result->bindParam(':year', $book['year'], PDO::PARAM_INT);
        $result->bindParam(':ISBN', $book['isbn'], PDO::PARAM_STR);
        $result->bindParam(':price', $book['price'], PDO::PARAM_INT);
        $result->bindParam(':pages', $book['pages'], PDO::PARAM_INT);
        $result->bindParam(':description', $book['description'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $book['publisher'], PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function deleteBookById($id) {
        $db = Db::getConnection();
        $result = $db->query('DELETE FROM books WHERE id = ' . $id);
        
        return $result;
    }
    
    public static function searchBooks($query) {
        $db = Db::getConnection();
        
//        $result = $db->query('SELECT id, title, author, price, year, publisher '
//                . 'FROM books WHERE title = "' . $query . '" or author = "'
//                . $query . '" or year = "' . $query . '" or publisher = "' . $query . '"');
        $result = $db->query('SELECT id, title, author, price, year, publisher ' .
                'FROM books WHERE MATCH (title, author, publisher) ' .
                'AGAINST ("' . $query . '") or year = "' . $query . '";' );
        
        $i = 0;
        $booksList = array();
        while ($row = $result->fetch()) {
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['author'] = $row['author'];
            $booksList[$i]['price'] = $row['price'];
            $booksList[$i]['id'] = $row['id'];
            $i++;
        }

        return $booksList;
    }
    
}
