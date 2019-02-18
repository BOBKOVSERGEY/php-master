<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <?php echo $breadcrumbs; ?>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
  <div class="container">
    <div class="prdt-top">

      <div class="col-md-9 prdt-left">
        <?php if (!empty($products)) { ?>
          <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
          <div class="product-one">
            <?php foreach ($products as $product) {?>

              <div class="col-md-4 product-left p-left">
                <div class="product-main simpleCart_shelfItem">
                  <a href="product/<?php echo $product->alias?>" class="mask"><img class="img-responsive zoom-img" src="images/<?php echo $product->img; ?>" alt="" /></a>
                  <div class="product-bottom">
                    <h3><a href="product/<?php echo $product->alias; ?>"><?php echo $product->title; ?></a></h3>
                    <p>Explore Now</p>
                    <h4>
                      <a class="add-to-cart-link" href="cart/add?id=<?php echo $product->id; ?>" data-id="<?php echo $product->id; ?>"><i></i></a>
                      <span class=" item_price"><?php echo $curr['symbol_left']; ?> <?php echo $product->price * $curr['value']; ?> <?php echo $curr['symbol_right']; ?></span>
                      <?php if ($product->old_price) {?>
                        <small><del><?php echo $curr['symbol_left']; ?> <?php echo $product->old_price * $curr['value']; ?> <?php echo $curr['symbol_right']; ?></del></small>
                      <?php } ?>
                    </h4>
                  </div>
                  <div class="srch">
                    <span>-50%</span>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="clearfix"></div>
            <div class="text-center">
              <p><?php echo count($products); ?> товарa(ов) из <?php echo $pagination->total; ?></p>
              <?php if ($pagination->countPages > 1)  { ?>
                <?php echo $pagination; ?>
              <?php } ?>
            </div>
          </div>
        <?php } else { ?>
          <h3>В этой категории товаров пока нет</h3>
        <?php } ?>
      </div>

      <div class="col-md-3 prdt-right">
        <div class="w_sidebar">
          <?php new \app\widgets\filter\Filter();?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>