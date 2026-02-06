$(".p_navItem2").each(function () {
    if ($(this).find(".p_level3Item").length != 0) {
        $(this).parents(".p_navItem1").addClass("atvm");
    }
});

$(".e_navigationF-24 .p_navItem1").hover(
    function () {
        $(this).find(".p_navBox2").addClass("aciver");
    },
    function () {
        $(this).find(".p_navBox2").removeClass("aciver");
    }
);

$(".e_navigationF-24 .p_navBox1").hover(
    function () {
        $(".nav_bj").addClass("avcaue");
    },
    function () {
        $(".nav_bj").removeClass("avcaue");
    }
);

$(function () {
    // Product tabs initialization
    $(".e_container-42 .Products_imst:nth-child(1)").addClass("active");
    $(".e_productTabList-90 .p_nameItem:nth-child(1)").addClass("active");
    
    $(".e_productTabList-90 .p_nameItem").click(function (event) {
        $(this).show().addClass("active");
        $(this).siblings().removeClass("active");

        $(".e_container-42 .Products_imst")
            .eq($(this).index())
            .addClass("active");
        $(".e_container-42 .Products_imst")
            .eq($(this).index())
            .siblings()
            .removeClass("active");
    });
    
    // Initialize first accordion item as open
    $(".e_container-49 .e_loop-50 .e_foldItem-52").first().addClass("showDetail");
});

// Individual accordion item toggle
$(".e_container-49 .e_loop-50 .e_foldItem-52 .p_ask").click(function () {
    $(this).parent(".e_foldItem-52").toggleClass("showDetail");
});

// Expand/Collapse All functionality
$(".e_container-49 .e_text-54").click(function () {
    var textContent = $(this).text().trim();
    
    if (textContent == "Развернуть все") {
        $(".e_container-49 .e_loop-50 .e_foldItem-52").addClass("showDetail");
        $(this).text("Свернуть все");
    } else if (textContent == "Свернуть все") {
        $(".e_container-49 .e_loop-50 .e_foldItem-52").removeClass("showDetail");
        $(this).text("Развернуть все");
    }
});

const $pageName = pageObj.name;
const $pageLink = window.location.href;
$("[data-pagelink] input").val($pageLink);
$("[data-pagename] input").val($pageName);