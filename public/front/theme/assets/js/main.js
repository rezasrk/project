$(document).ready(function () {
  $(".header-user__btns_panel__btn").click((e) => {
    console.log(e.target);
    var container = $(".header-user__btns_panel__items");
    container.fadeIn(200);
  });

  $(document).mouseup((e) => {
    console.log(e.target);
    var container = $(".header-user__btns_panel__items");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.hide();
    }
  });

  // input file text

  $(".text-input__file").filestyle({buttonBefore: true, placeholder: "فایلی انتخاب نشده"});

  $('.buttonText').text('انتخاب فایل')
});
