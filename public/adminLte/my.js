$(function () {
  $('.delete').on('click', function () {
    var res = confirm('Подтвердите действие');

    if (!res) return false;
  });

  $('.sidebar-menu a').each(function () {
    // получаем location текушей страницы
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    // получаем href текушего элемента
    var link = this.href;
    if(link == location) {
      // находим родителя
      $(this).parent().addClass('active');
      // находим предка
      $(this).closest('.treeview').addClass('active');
    }
  });

  if (document.querySelector('#content')) {
    CKEDITOR.replace('content');
  }
  
  $('#reset-filter').on('click', function () {
    $('#filter input[type=radio]').prop('checked', false);
    return false;
  })

  $(".select2").select2({
    placeholder: "Начните вводить наименование товара",
    //minimumInputLength: 2,
    cache: true,
    ajax: {
      url: adminpath + "/product/related-product",
      delay: 250,
      dataType: 'json',
      data: function (params) {
        return {
          q: params.term,
          page: params.page
        };
      },
      processResults: function (data, params) {
        return {
          results: data.items,
        };
      },
    },
  });


});