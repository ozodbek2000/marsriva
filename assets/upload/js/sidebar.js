$(function () {
    // Возврат наверх
    $('.p_backtop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1200);
        return false;
    });

    // Возврат вниз - пересчитываем высоту при каждом клике
    $('.p_backbottom').click(function () {
        let pageHeight = $(document).height();
        let windowHeight = $(window).height();
        
        $('html, body').animate({ 
            scrollTop: pageHeight - windowHeight 
        }, 1200);
        return false;
    });

    // Показ/скрытие кнопки
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.p_backtop').addClass("zx_hi");
        } else {
            $('.p_backtop').removeClass("zx_hi");
        }
    });

    // Остальной код...
    $(".zx_btm_o").click(function () {
        $(this).prev().toggleClass("zx_right");
    });

    $(".zx_type").each(function () {
        var ttt = $(this).text();
        $(this).parent().addClass("zx_" + ttt)
    });

    $(".zx_haoname").each(function(){
        let nametr = $(this).find("span").text();
        $(this).next().next(".zx_xjie").find(".zx_zh").prepend("<p class='zx_ts'>" + nametr + "</p>")
    });

    $(".zx_6").find(".zx_zh").prepend("<p class='zx_ts'>扫一扫微信二维码<br>关注我们动态</p>")
    $(".zx_6").find(".s_img").prepend("<p class='zx_bts'>微信二维码</p>")
});