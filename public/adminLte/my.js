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

});