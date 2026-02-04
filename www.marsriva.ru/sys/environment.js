window.pageType = 'vue';

if(location.href.indexOf('noHead=true')>-1){
    window.noHead = true
}

window.__cece = {
    baseURL:window.location.hostname=='localhost'?'http://2312285003.p.make.test-dcloud.portal1.portal.thefastmake.com':location.origin
}

if(!window.noHead){
    dynamicLoadJs(__cece.baseURL + '/npublic/libs/core/ceccjquery.js,require.js,lib.js,page.js')
    dynamicLoadCss(__cece.baseURL + '/npublic/libs/css/ceccbootstrap.min.css,global.css')
    dynamicLoadCss(__cece.baseURL + '/css/site.css',function(){},{id:"siteLink"})
}

function dynamicLoadCss (url, callback, attr) {
    var head = document.getElementsByTagName("head")[0]
    var link = document.createElement("link")
    link.type = "text/css"
    link.rel = "stylesheet"
    link.href = url
    for(var i in attr){
        link[i] = attr[i]
        console.log(i)
    }
    head.appendChild(link)
    link.onload = function () {
        if (callback && typeof callback == "function") {
            callback()
        }
    }
}

function dynamicLoadJs (url, callback) {
    var s = document.getElementsByTagName("script")[0]
    var script = document.createElement("script")
    script.src = url
    s.parentNode.insertBefore(script, s)
    script.onload = function () {
        if (callback && typeof callback == "function") {
            callback()
        }
    }
}

function isDesignMode() {
    try {
        if (!(getParentWindow().$LAB != null && typeof getParentWindow().$LAB === 'object')) {
            return false
        } else {
            return true
        }
    } catch (error) {
        return false;
    }
}
//   if (isDesignMode()) {
//     $(window).resize(function () {
//       let width = $(window).width();
//       let pathname = window.location.pathname;
//       if (width <= 1024) {
//         window.location.href = "http://" + tenant.mobileMakeDomain + pathname
//       }
//     })
//   }