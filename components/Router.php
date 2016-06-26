<?php
class Router {
    //Массив с маршрутами
    private $routes;
    
    public function __construct() {
        $routesPath = ROOT.'/components/routes.php';
        $this->routes = include($routesPath);
    }
    
    // Возвращает строку запроса:
    private function getURI() {
            if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        // Получаем строку запроса
        $uri = $this->getURI();
        
        // Проверяем наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                
                /*получаем внутренний маршрут(контроллер/экшн/параметры)
                из внешнего(строки запроса) согласно правилу */
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                //преобразуем маршрут из строки в массив
                $segments = explode('/', $internalRoute);
                
                //получаем контроллер, метод(экшн), и параметры
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;
        
        
                //Подключаем файл соответствующего класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                /*создаём объект класса контроллера который был подключен выше
                и вызываем его метод(экшн) с параметрами*/
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                break;
                }
            }
        }
    }
}

?>