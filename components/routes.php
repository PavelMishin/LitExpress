<?php

//массив с маршрутами вида "запрос => класс/метод/параметры
return array(
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',
    
    'catalog/([0-9]+)' => 'catalog/book/$1',
    'catalog/([a-z]+)/([a-z]+)/page-([0-9]+)' => 'catalog/booksbysubcategory/$1/$2/$3',
    'catalog/([a-z]+)/page-([0-9]+)' => 'catalog/booksbycategory/$1/$2',
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog/([a-z]+)/([a-z]+)' => 'catalog/booksbysubcategory/$1/$2',
    'catalog/search' => 'catalog/search',
    'catalog/([a-z]+)' => 'catalog/booksbycategory/$1',
    'catalog' => 'catalog/index',
    
    
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/count' => 'cart/count',
    'cart' => 'cart/index',
    'checkout' => 'cart/checkout',
    
    'user/registration' => 'user/registration',
    'user/login' => 'user/login',
    'user/cabinet' => 'cabinet/index',
    'user/logout' => 'user/logout',
    'user/edit' => 'cabinet/edit',
    'user/forgot' => 'user/forgot',
    
    'admin/goods/delete/([0-9]+)' => 'admin/deletegoods/$1',
    'admin/goods/update/([0-9]+)' => 'admin/updategoods/$1',
    'admin/changeOrderStatus/([0-9]+)/([0-9]+)' => 'admin/changeorderstatus/$1/$2',
    'admin/goods/create' => 'admin/creategoods',
    'admin/goods/page-([0-9]+)' => 'admin/goods/$1',
    'admin/goods' => 'admin/goods',
    'admin/orders/update/([0-9]+)' => 'admin/updateorders/$1',
    'admin/orders' => 'admin/orders',
    
    'admin' => 'admin/index',
    'feedback' => 'main/feedback',
    'delivery' => 'main/delivery',
    'about' => 'main/about',
    'contacts' => 'main/contacts',
    'call' => 'main/call',
    '' => 'main/index'
);

?>

