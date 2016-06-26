<?php

class Quotations {
    
    public static function getRandomQuatation() {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT * FROM quotations');
        
        $i = 0;
        
        while ($row = $result->fetch()) {
            $quotations[$i]['id'] = $row['id'];
            $quotations[$i]['quotation'] = $row['content'];
            $quotations[$i]['author'] = $row['author'];
            $i++;
        }
        
        $randomQuotation = array_rand($quotations, 1);
        return $quotations[$randomQuotation];
        }
    }
