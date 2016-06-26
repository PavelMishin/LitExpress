<?php

class Categories {
    
    public static function getCategoriesList() {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM categories');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['rus'] = $row['rus'];
            $categoriesList[$i]['image'] = $row['image'];
            $categoriesList[$i]['eng'] = $row['eng'];
            $i++;
        }
        return $categoriesList;
    }
    
    public static function getSubCategoriesList() {
        $db = Db::getConnection();
        $resultSubCategories = $db->query('SELECT * FROM sub_categories');

        $i = 0;
        while ($row = $resultSubCategories->fetch()) {
            $subCategoriesList[$i]['id'] = $row['id'];
            $subCategoriesList[$i]['parent_id'] = $row['parent_id'];
            $subCategoriesList[$i]['rus'] = $row['rus'];
            $subCategoriesList[$i]['eng'] = $row['eng'];
            $i++;
        }
        
        return $subCategoriesList;
    }
    
}
