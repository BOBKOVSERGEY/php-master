<?php


namespace app\controllers;



use app\models\Breadcrumbs;
use app\models\Product;
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
    $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

    // get relation  product
    $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?', [$product->id]);

    // save cookie showed product
    $productModel = new Product();
    $productModel->setRecentlyViewed($product->id);

    // showed product
    $rViewed = $productModel->getRecentlyViewed();
    $recentlyViewed = null;


    if ($rViewed) {
      $recentlyViewed = R::find('product', 'id IN(' . R::genSlots($rViewed) . ') LIMIT 3', $rViewed);
    }

    // get gallery
    $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);


    // get modifications product
    $modification = R::findAll('modification', 'product_id = ?', [$product->id]);

    // set meta
    $this->setMeta($product->title, $product->description, $product->keywords);
    // передаем в вид
    $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'modification'));

  }
}