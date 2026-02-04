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
    $('.e_navigationF-24 .p_navItem1 .sj_warp').find('.p_level3Box').parents('.p_navItem1').addClass('pro_li');
    $('.e_navigationF-24 .pro_li .dropdown .left ul .p_navItem2').eq(0).addClass('cur');
    $('.e_navigationF-24 .pro_li .dropdown .center .sj_warp ul').eq(0).addClass('pro_cur');
    if (wind_w > 768) {
        $('.e_navigationF-24 .pro_li .dropdown .left ul').on('mouseenter', 'li', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            var index = $(this).index();
            $(this).closest('.dropdown').find('.sj_warp ul').eq(index).stop().fadeIn().siblings().hide();
        })
    }

    $('.search_warp').click(function(){
        if($('.boxForm').hasClass('active')){
            $('.boxForm').removeClass('active');
           $("#c_navigation_126_P_636-1706844067715").removeClass('active');
          $("#c_navigation_126_P_636-17125482983390").removeClass('active');
          	
        }else{
            $('.boxForm').addClass('active');
          $("#c_navigation_126_P_636-1706844067715").addClass('active');
           $("#c_navigation_126_P_636-17125482983390").addClass('active');
        }
     })

     $('.closeFrom').click(function(){
        $('.boxForm').removeClass('active');
       $("#c_navigation_126_P_636-1706844067715").removeClass('active');
        $("#c_navigation_126_P_636-17125482983390").removeClass('active');
    })
});