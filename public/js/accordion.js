
//アコーディオン部分
$(function () {
  // タイトルをクリックすると
  $('.accordion-open').click(function () {
    // クリックした次の要素を開閉
    $(this).toggleClass('active');
    // タイトルにopenクラスを付け外しして矢印の向きを変更
    $('.accordion-content').slideToggle();
  });
});

// モーダル部分
$(function () {
  $('.edit').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });

});
