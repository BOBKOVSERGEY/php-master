<!--banner-starts-->
<div class="bnr" id="home">
  <div  id="top" class="callbacks_container">
    <ul class="rslides" id="slider4">
      <li>
        <img src="images/bnr-1.jpg" alt=""/>
      </li>
      <li>
        <img src="images/bnr-2.jpg" alt=""/>
      </li>
      <li>
        <img src="images/bnr-3.jpg" alt=""/>
      </li>
    </ul>
  </div>
  <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--Slider-Starts-Here-->

<!--End-slider-script-->
<!--about-starts-->
<?php if ($brands) {?>
<div class="about">
  <div class="container">
    <div class="about-top grid-1">
      <?php foreach ($brands as $brand) { ?>
      <div class="col-md-4 about-left">
        <figure class="effect-bubba">
          <img class="img-responsive" src="images/<?php echo $brand->img; ?>" alt=""/>
          <figcaption>
            <h2><?php echo $brand->title; ?></h2>
            <p><?php echo $brand->description; ?></p>
          </figcaption>
        </figure>
      </div>
      <?php } ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php } ?>
<!--about-end-->
<!--product-starts-->
<?php if ($hits) {

  $curr = \ishop\App::$app->getProperty('currency');
  //debug($curr);
  ?>


<div class="product">
  <div class="container">
    <div class="product-top">
      <div class="product-one">
        <?php foreach ($hits as $hit) {?>
        <div class="col-md-3 product-left">
          <div class="product-main simpleCart_shelfItem">
            <a href="product/<?php echo $hit->alias?>" class="mask"><img class="img-responsive zoom-img" src="images/<?php echo $hit->img; ?>" alt="" /></a>
            <div class="product-bottom">
              <h3><a href="product/<?php echo $hit->alias; ?>"><?php echo $hit->title; ?></a></h3>
              <p>Explore Now</p>
              <h4>
                <a class="add-to-cart-link" href="cart/add?id=<?php echo $hit->id; ?>" data-id="<?php echo $hit->id; ?>"><i></i></a>
                <span class=" item_price"><?php echo $curr['symbol_left']; ?> <?php echo $hit->price * $curr['value']; ?> <?php echo $curr['symbol_right']; ?></span>
                <?php if ($hit->old_price) {?>
                  <small><del><?php echo $curr['symbol_left']; ?> <?php echo $hit->old_price * $curr['value']; ?> <?php echo $curr['symbol_right']; ?></del></small>
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
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--product-end-->
