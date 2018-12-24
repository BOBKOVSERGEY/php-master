<?php


namespace app\controllers;


use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

  public function indexAction()
  {
    $posts = R::findAll('test');
    $this->setMeta('Заголовог главной страницы', 'Описание главной страницы', 'Ключевые слова главной страницы');

    $names = ['Sergey', 'Kira'];

    $name = 'John';
    $age = 31;

    $cache = Cache::instance();
    //$cache->set('test', $names);
    //$data = $cache->get('test');
    //$cache->delete('test');
    //debug($data);

    $this->set(compact('name', 'age', 'posts', 'names'));
  }
}