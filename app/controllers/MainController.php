<?php


namespace app\controllers;


use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

  public function indexAction()
  {

    $brands = R::find('brand', 'LIMIT 3');

    $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");

    $this->setMeta('Заголовог главной страницы', 'Описание главной страницы', 'Ключевые слова главной страницы');

    $this->set(compact('brands', 'hits'));
  }
}