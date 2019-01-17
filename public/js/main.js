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


  })

});