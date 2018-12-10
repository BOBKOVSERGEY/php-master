<?php


namespace ishop;


class Router
{
  protected static $routes = [];
  protected static $route = [];

  // метод записывает правила в таблицу маршрутов
  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  // метод будет возвращать таблицу маршрутов
  public static function getRoutes()
  {
    return self::$routes;
  }

  // метод будет возвращать текущий маршрут
  public static function getRoute()
  {
    return self::$route;
  }

  // метод, который будет принимать запрос
  public static function dispatch($url)
  {
    if (self::matchRoute($url)) {
      $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
      if (class_exists($controller)) {
        $controllerObject = new $controller(self::$route);
        $action = self::lowerCamelCase(self::$route['action']) . 'Action';
        if (method_exists($controllerObject, $action)) {
          $controllerObject->$action();
        } else {
          throw new \Exception("Метод $controller::$action", 404);
        }
      } else {
        throw new \Exception('Контроллер ' . $controller . ' не найден', 404);
      }
    } else {
      throw new \Exception('Страница не найдена', 404);
    }
  }

  // будет принимать url и искть соответствие в таблице маршрутов
  public static function matchRoute($url)
  {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#", $url, $matches)) {
        foreach ($matches as $k => $v) {
          if (is_string($k)) {
            $route[$k] = $v;
          }
        }
        if (empty($route['action'])) {
          $route['action'] = 'index';
        }
        if (!isset($route['prefix'])) {
          $route['prefix'] = '';
        } else {
          $route['prefix'] .= '\\';
        }
        $route['controller'] = self::upperCamelCase($route['controller']);
        // сохраняес в свойсво route, в котором храниться текущий маршрут
        self::$route = $route;
        return true;
      }
    }

    return false;

  }

  protected static function upperCamelCase($name)
  {
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
  }

  protected static function lowerCamelCase($name)
  {
    return lcfirst(self::upperCamelCase($name));
  }

}