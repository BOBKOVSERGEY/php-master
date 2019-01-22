<?php
// если есть товары в корзине
if (!empty($_SESSION['cart'])) { ?>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead>
      <tr>
        <th>Фото</th>
        <th>Наименование</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($_SESSION['cart'] as $id => $item) {?>
        <tr>
          <td>
            <a href="product/<?php echo $item['alias']; ?>">
              <img height="100px" src="images/<?php echo $item['img']; ?>" alt="">
            </a>
          </td>
          <td>
            <a href="product/<?php echo $item['alias']; ?>">
              <?php echo $item['title']; ?>
            </a>
          </td>
          <td>
            <?php echo $item['qty']; ?>
          </td>
          <td>
            <?php echo $_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right']; ?>
          </td>
          <td>
            <span data-id="<?php echo $id; ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td>Итого:</td>
        <td colspan="4" class="text-right cart-qty"><?php echo $_SESSION['cart.qty']; ?></td>
      </tr>
      <tr>
        <td>На сумму:</td>
        <td colspan="4" class="text-right cart-sum"><?php echo $_SESSION['cart.currency']['symbol_left'] . ' ' . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']; ?></td>
      </tr>
      </tbody>
    </table>
  </div>
<?php } else {?>
  <h3>Корзина пуста</h3>
<?php } ?>
