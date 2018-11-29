<?php


namespace ishop;


class App
{
  // публичное статическое свойство
  public static $app;

  public function __construct()
  {
    //обрежем концевой слеш
    $query = trim($_SERVER['QUERY_STRING'], '/');
    session_start();

    self::$app = Registry::instance();
    $this->getParams();
  }

  protected function getParams()
  {
    $params = require_once CONF . '/params.php';

    if (!empty($params)) {
      foreach ($params as $k => $v) {
        self::$app->setProperty($k, $v);
      }
    }
  }

}