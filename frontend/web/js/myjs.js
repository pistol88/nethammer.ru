// Кнопка наверх
$(document).ready(function () {
    $(document.body).append('<a id="back_top" href="#"></a>');
    $('#back_top').hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 490) {
            $('#back_top').fadeIn('slow');
        } else {
            $('#back_top').fadeOut('slow');
        };
    });
    $('#back_top').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        $('#back_top').fadeOut('slow').stop();
    });
}); 
// Фильтрация для input
$('input.num').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g, '');
});
// Плавный переход по якорям
$('header a[href^="#"]').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top - 0}, 800);
        return false; 
});
$('a.animate').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top - 0}, 800);
        return false; 
});
// Переключаем реквизиты
$('.details a[data-toggle=collapse]').on('click', function(){
    $(this).remove();
});
// Переключает фильтр в портфолио
$('#filters li').on('click', function(){    
    $('#filters li').removeClass('active');
    $(this).addClass('active');
});
// Выбор фильтров в разделе Технология
$('#chuseTags #tags-filter li').on('click', function(){
    $(this).toggleClass('active');
});
// Загрузка файла/ссылки резюме
$('.upload-resume a').on('click', function(){
    $('.upload-resume a').toggle();
    $('.upload-resume input').toggle();
});
// Навигация для кейса
$(window).scroll(function () {
    if ($(this).scrollTop() >= 351) {
        $('.sidebarmenu').addClass('sticky-sidebar');
        $('.case-text').addClass('col-sm-offset-3');
    } else {
        $('.sidebarmenu').removeClass('sticky-sidebar');
        $('.case-text').removeClass('col-sm-offset-3');
    }
});
$('.sidebarmenu a').on('click', function(){
    $('.sidebarmenu li').removeClass('active');
    $(this).closest('li').addClass('active');
});
// Смена активного пункта при прокрутке кейса
var lastId,
topMenu = $(".sidebarmenu"),
    topMenuHeight = topMenu.outerHeight() + 15,
    menuItems = topMenu.find("a"),
    scrollItems = menuItems.map(function () {
        var item = $($(this).attr("href"));
        if (item.length) {
            return item;
        }
    });
$(window).scroll(function () {
    var fromTop = $(this).scrollTop() + topMenuHeight;
    var cur = scrollItems.map(function () {
        if ($(this).offset().top < fromTop)
            return this;
    });
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";
    if (lastId !== id) {
        lastId = id;
        menuItems
            .parent().removeClass("active")
            .end().filter("[href='#" + id + "']").parent().addClass("active");
    }
});

// Мобильная менюшка
$('.navbar-toggle').on('click', function(){
});$('#menu').on('shown.bs.collapse', function () {    $('.navbar-toggle i').toggle();    $('header').toggleClass('mobile-menu');});$('#menu').on('hidden.bs.collapse', function () {    $('.navbar-toggle i').toggle();    $('header').toggleClass('mobile-menu');});
//$('#fullpage').on('click', function(){
//    $('.navbar-collapse').collapse('hide');
//    $('header').removeClass('mobile-menu');
//    $('.navbar-toggle i').toggle();
//    if ($('header').hasClass('mobile-menu')) {
//        console.log('Есть!');
//        $('.navbar-toggle i').toggle();
//    } else {
//        console.log('Нету');
//    }
//});