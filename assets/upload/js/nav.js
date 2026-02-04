//top fixed
/**$(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
        $('.fIxBox').parent().addClass('active')
    } else {
        $('.fIxBox').parent().removeClass('active')
    }
});
**/
$('.p_navItem1').parent().mouseenter(function () {
    $("#c_navigation_126_P_636-1706844067715").addClass('active')
    $("#c_navigation_126_P_636-17125482983390").addClass('active')
}).mouseleave(function () {
    $("#c_navigation_126_P_636-1706844067715").removeClass('active')
    $("#c_navigation_126_P_636-17125482983390").removeClass('active')
});

//top nav
$(function () {
    var wind_w = $(window).width();
    var $navigation = $('[id^="c_navigation_126"]');
    
    $('.e_navigationF-24 .p_navItem1 .sj_warp').find('.p_level3Box').parents('.p_navItem1').addClass('pro_li');
    $('.e_navigationF-24 .pro_li .dropdown .left ul .p_navItem2').eq(0).addClass('cur');
    $('.e_navigationF-24 .pro_li .dropdown .center .sj_warp ul').eq(0).addClass('pro_cur');
    
    // ============================================
    // DESKTOP КОД (твой оригинальный)
    // ============================================
    if (wind_w > 768) {
        $('.e_navigationF-24 .pro_li .dropdown .left ul').on('mouseenter', 'li', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            var index = $(this).index();
            $(this).closest('.dropdown').find('.sj_warp ul').eq(index).stop().fadeIn().siblings().hide();
        })
    }

    // Мобильное меню toggle
    $('.p_navButton').on('click', function() {
        $(this).toggleClass('e');
        $(this).find('p').toggleClass('showmenu');
        $(this).find('span').toggleClass('biahuan');
        $('.p_navBox1').toggleClass('pkcclb');
        
        // Если меню закрывается, закрыть все аккордеоны
        if (!$('.p_navBox1').hasClass('pkcclb')) {
            $('.p_navBox2').removeClass('aciver').hide();
            $('.p_navCon .p_jtIcon').removeClass('rotate');
            $('.p_navCon a').removeClass('rotate');
        }
    });

    // Поиск
    $('.search_warp').click(function(){
        if($('.boxForm').hasClass('active')){
            $('.boxForm').removeClass('active');
            $navigation.removeClass('active');
        } else {
            $('.boxForm').addClass('active');
            $navigation.addClass('active');
        }
    });

    $('.closeFrom').click(function(){
        $('.boxForm').removeClass('active');
        $navigation.removeClass('active');
    });

    // ============================================
    // MOBILE КОД (мой аккордеон)
    // ============================================
    if (wind_w <= 768) {
        // АККОРДЕОН ДЛЯ МОБИЛЬНОГО МЕНЮ - инициализация
        $('.p_navBox2').hide();
        $('.p_navCon .p_jtIcon').removeClass('rotate');
        $('.p_navCon a').removeClass('rotate');

        // Клик по всему li элементу
        $('.p_navItem1').on('click', function (e) {
            // Работает только если меню открыто
            if (!$('.p_navBox1').hasClass('pkcclb')) {
                return;
            }
            
            // Если клик по ссылке внутри подменю - не обрабатываем
            if ($(e.target).closest('.p_navBox2').length > 0) {
                return;
            }
            
            // Если клик непосредственно по ссылке в основном меню с реальным href - не обрабатываем
            var $target = $(e.target);
            if ($target.is('a') && $target.attr('href') && $target.attr('href') !== 'javascript:;' && $target.attr('href') !== '#') {
                return;
            }
            
            e.preventDefault();
            e.stopPropagation();

            var $this = $(this);
            var $submenu = $this.find('.p_navBox2').first();
            
            // Если у элемента нет подменю - не обрабатываем
            if ($submenu.length === 0) {
                return;
            }
            
            var $navCon = $this.find('.p_navCon').first();
            var $icon = $navCon.find('.p_jtIcon');
            var $link = $navCon.find('a');
            
            // Проверяем видимость напрямую
            var isVisible = $submenu.is(':visible');
            
            if (isVisible) {
                // Закрываем текущий
                $submenu.stop().slideUp(300, function() {
                    $(this).removeClass('aciver');
                });
                $icon.removeClass('rotate');
                $link.removeClass('rotate');
            } else {
                // Закрываем все остальные
                $('.p_navBox2').not($submenu).stop().slideUp(300, function() {
                    $(this).removeClass('aciver');
                });
                $('.p_navItem1').not($this).find('.p_jtIcon').removeClass('rotate');
                $('.p_navItem1').not($this).find('.p_navCon a').removeClass('rotate');
                
                // Открываем текущий
                $submenu.addClass('aciver').stop().slideDown(300);
                $icon.addClass('rotate');
                $link.addClass('rotate');
            }
        });

        // АККОРДЕОН ДЛЯ ФУТЕРА (e_bottomNav-29)
        $('.e_bottomNav-29 .p_level2Box').hide();

        // Клик по всему li элементу футера
        $('.e_bottomNav-29 .p_level1Item').on('click', function(e) {
            // Если клик по ссылке внутри подменю - не обрабатываем
            if ($(e.target).closest('.p_level2Box').length > 0) {
                return;
            }
            
            // Если клик непосредственно по ссылке с реальным href - не обрабатываем
            var $target = $(e.target);
            if ($target.is('a') && $target.attr('href') && $target.attr('href') !== 'javascript:;' && $target.attr('href') !== '#') {
                return;
            }
            
            e.preventDefault();
            e.stopPropagation();

            var $this = $(this);
            var $submenu = $this.find('.p_level2Box').first();
            
            // Если у элемента нет подменю - не обрабатываем
            if ($submenu.length === 0) {
                return;
            }
            
            var $icon = $this.find('.p_jtIcon').first();
            
            // Проверяем видимость напрямую
            var isVisible = $submenu.is(':visible');

            if (isVisible) {
                // Закрываем текущий
                $submenu.stop().slideUp(300);
                $icon.removeClass('active');
            } else {
                // Закрываем все остальные
                $('.e_bottomNav-29 .p_level2Box').not($submenu).stop().slideUp(300);
                $('.e_bottomNav-29 .p_jtIcon').not($icon).removeClass('active');
                
                // Открываем текущий
                $submenu.stop().slideDown(300);
                $icon.addClass('active');
            }
        });
    }
});