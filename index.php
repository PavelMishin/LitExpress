<?php
   //Фронт-контроллер

   //вывод ошибок
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   
   //определяем константу ROOT равную путю родительской папки для подключения компонентов
   define('ROOT', dirname(__FILE__));
   
   session_start();
   require_once(ROOT . '/components/Autoload.php');
   
   //создаём маршрутизатор
   $router = new Router();
   /*запускаем маршрутизатор - создаётся контроллер(в виде объекта),
   соответствующий строке запроса, и запускается метод этого контроллера */
   $router->run();
   
?>
