<?php


namespace app\controllers;


use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

  public function indexAction()
  {
    $brands = R::find('brand', 'LIMIT 3');

    $this->setMeta('Заголовог главной страницы', 'Описание главной страницы', 'Ключевые слова главной страницы');

    $this->set(compact('brands'));
  }
}