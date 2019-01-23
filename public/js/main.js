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

    if($.trim(cart) == '<h3>Корзина пуста</h3>'){
      $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }else{
      $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
      $('.simpleCart_total').html($('#cart .cart-sum').text());
    }else{
      $('.simpleCart_total').text('Корзина пуста');
    }
  }
  
  function getCart() {
    // все готов отправляем запрос на сервер
    $.ajax({
      type: 'GET',
      url: '/cart/show',
      success: function (r) {
        showCart(r);
      },
      error: function () {
        alert('Ошибка, попробуйте позже!');
      }
    });
  }

  $('#header-cart').on('click', function (e) {
    e.preventDefault();
    getCart();
  });

  $('#cart .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
      type: 'GET',
      url: '/cart/delete',
      data: {
        id: id
      },
      success: function (r) {
        showCart(r);
      },
      error: function (r) {
        alert('Error!');
      }
    })
  });

  function clearCart() {
    $.ajax({
      type: 'GET',
      url: '/cart/clear',
      success: function (r) {
        showCart(r);
      },
      error: function (r) {
        alert('Error!');
      }
    });
  }
  $('#clear-cart').on('click', function () {
    clearCart();
  })

});