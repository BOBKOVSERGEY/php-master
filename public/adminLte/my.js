$(function () {
  $('.delete').on('click', function () {
    var res = confirm('Подтвердите действие');

    if (!res) return false;
  })
});