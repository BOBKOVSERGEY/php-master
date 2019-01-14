<?php


namespace app\controllers;



use RedBeanPHP\R;

class ProductController extends AppController
{
  public function viewAction()
  {
    $alias = $this->route['alias'];
    $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);

    if (!$product) {
      throw new \Exception('Страница не найдена', '404');
    }

    // get breadcrumbs

    // get relation  product

    $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?', [$product->id]);
    //debug($related);

    // save cookie showed product

    // showed product

    // get gallery

    // get modifications product

    // set meta
    $this->setMeta($product->title, $product->description, $product->keywords);
    // передаем в вид
    $this->set(compact('product', 'related'));

  }
}