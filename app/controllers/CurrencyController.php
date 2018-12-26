<?php


namespace app\controllers;


use RedBeanPHP\R;

class CurrencyController extends AppController
{
  public function changeAction()
  {
    // если у нас не пусто в get, то перем то что пришло из get в противном случае запишем null
    $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;

    if ($currency) {
      $curr = R::findOne('currency', 'code=?', [$currency]);
      if (!empty($curr)) {
        setcookie('currency', $currency, time() + 3600 * 25 * 7, '/');
      }
    }
    redirect();
  }
}