"use strict";
function _defineProperty(e, t, i) {
    return t in e ? Object.defineProperty(e, t, {
        value: i,
        enumerable: !0,
        configurable: !0,
        writable: !0
    }) : e[t] = i,
    e
}
$define(["cmsAjax", "pl_toast"], function(e) {
    return {
        init: function() {
            this._params.id;
            var a = this.scope
              , e = a.find(".e_inputHidden-24")
              , t = (e.find('input[name="hiddenValue24-0"]').val(),
            e.find('input[name="hiddenValue24-1"]').val())
              , e = a.find(".e_text-18").text().trim()
              , r = !0
              , c = (_defineProperty(t = {
                symbolRetailPrice: a.find(".e_text-10").text(),
                symbolPrice: a.find(".e_text-8").text(),
                code: a.find(".e_text-31").text(),
                stock: a.find(".e_text-18").text(),
                moq: a.find(".e_productNumber-20 .p_reduce").data("moq"),
                id: t
            }, "stock", "999+" !== e ? Number(e) : e),
            _defineProperty(t, "moq", a.find(".e_productNumber-20 .p_reduce").data("moq")),
            _defineProperty(t, "productImageList", []),
            t);
            function i(e) {
                a.find(".e_text-10").text(e.symbolRetailPrice),
                a.find(".e_text-8").text(e.symbolPrice),
                a.find(".e_text-31").text(e.code),
                a.find(".e_text-18").text(e.stock),
                a.find(".e_productNumber-20 .p_reduce").data("moq", e.moq || 1),
                a.find(".e_productNumber-20 .p_input").val(e.moq),
                a.find(".e_productNumber-20 .p_increase").data("stock", e.stock),
                function(e) {
                    var t = a.find(".e_magnifier-27")
                      , i = e.productImageList;
                    if (e.productSkuRelatedList && 0 < e.productSkuRelatedList.length)
                        i = e.productSkuRelatedList,
                        r = !1;
                    else {
                        if (r)
                            return;
                        i = c.productImageList,
                        r = !0
                    }
                    {
                        var n, d;
                        i && 0 < i.length && (n = [],
                        d = [],
                        t.find(".static-img").remove(),
                        t.find(".static-item").remove(),
                        i.forEach(function(e) {
                            e = $.handleDataImg(e.path);
                            n.push('\n                        <li class="static-img">\n                            <div class="small-img"  data-url="'.concat(e, '">  \n                                <img src="').concat(e, '" />\n                            </div>\n                        </li>\n                    ')),
                            d.push('\n                        <div class="image-item static-item" style="display: none;">\n                            <img src="'.concat(e, '" alt="undefined" title="undefined" la="la">\n                        </div>\n                    '))
                        }),
                        t.find(".images-cover").append(d.join("")),
                        t.find(".thumbnail_box").append(n.join("")).css("left", 0),
                        t.find(".thumbnail_box").children(":first").trigger("click"))
                    }
                }(e),
                a.find("[class^='e_sceneBtnOrder-'] [name='skuId']").val(e.id)
            }
            function n(e) {
                !e.id || e.stock < e.moq || 0 == e.stock ? d(!0) : d(!1)
            }
            function d(e) {
                e ? (a.find(".e_sceneBtnOrder-23").addClass("disabled"),
                a.find(".e_sceneBtnOrder-22").addClass("disabled")) : (a.find(".e_sceneBtnOrder-23").removeClass("disabled"),
                a.find(".e_sceneBtnOrder-22").removeClass("disabled"))
            }
            a.find(".e_magnifier-27 .thumbnail_box .static-img").each(function(e, t) {
                t = function(t) {
                    /^\/repository/.test(t) ? t = t.replace("/repository/", "") : /^http/.test(t) && __ce.imgStaticUrl.forEach(function(e) {
                        t = t.replace(e, "")
                    });
                    t.startsWith("/") && (t = t.substr(1));
                    {
                        var e;
                        t.match(/_[\d]*xaf\./) && 0 < t.match(/_[\d]*xaf\./).length && (e = t.match(/_[\d]*xaf\./).index,
                        t = t.substring(0, e))
                    }
                    return t
                }($(t).find("img").attr("src"));
                c.productImageList.push({
                    path: t
                })
            }),
            0 == a.find(".e_specification-41").find(".p_item").length ? n(c) : n({}),
            a.on("updateData", function(e, t) {
                t.id ? (n(t),
                i(t)) : (n({}),
                i(c))
            })
        }
    }
});
