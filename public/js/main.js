$(function () {
  $('#currency').on('change', function () {
    window.location = 'currency/change?curr=' + $(this).val();
  })

  $('.available select').on('change', function () {
    // get id
    let modId = $(this).val(),
    // get tilte
        color = $(this).find('option').filter(':selected').data('title'),
    // get price
        price = $(this).find('option').filter(':selected').data('price'),
    // base price
        basePrice = $('#base-price').data('base');
    if (price) {
      $('#base-price').text(price);
    } else {
      $('#base-price').text(basePrice);
    }
  });

  //cart
  $('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    let id = $(this).data('id'),
        // если есть значение у input то мы берем его, если нет присваиваем единицу
        // получаем кол-во
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        // получаем модификацию товара
        mod = $('.available select').val();

    // все готов отправляем запрос на сервер
    $.ajax({
      type: 'GET',
      url: '/cart/add',
      data: {
        id: id,
        qty: qty,
        mod: mod
      },
      success: function (r) {
        showCart(r);
      },
      error: function () {
        alert('Ошибка, попробуйте позже!');
      }
    });
  });
  
  function showCart(cart) {
    console.log(cart);
  }

});