var needPolyfill = isIE() ? "polyfill" : ""
$define([needPolyfill],function () {
    var httpReg = /(http|https):\/\/([\w.]+\/?)\S*/
    var postData = function(url, data,params) {
        var p = {
            type:"POST",
            dataType:"JSON",
            headers:{
                "instance": tenant.bossProductInstance,
                "content-type" : "application/json;charset=utf-8"
            }
        }
        var pd = {}
        if(url.indexOf('?')>-1){
            var tmpD = url.split("?")[1].split("&")
            tmpD.forEach(e=>{
                let t = e.split("=")
                pd[t[0]]=t[1]
            })
        }
        var nd = Object.assign({} , pd , data || {})
        var np = Object.assign({} , p , params || {})
        np.headers = Object.assign({} , p.headers , params?(params.headers || {}):{})
        if(!httpReg.test(url)){
            if(np.act=='postfile'){
                url = __ce.baseURL + __ce.filePath + url;
            }else{
                url = __ce.baseURL + __ce.cmsAjaxUrl + url;
            }
        }
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: url,
                type: np.type,
                dataType: np.dataType,
                data: JSON.stringify(nd),
                headers: np.headers,
                success: function(res) {
                    resolve(res)
                },
                error: function(res) {
                    reject(res)
                }
            });
        });
    };
    var getDate = function(url,data,params){
        if(!httpReg.test(url)){
            url = __ce.baseURL + __ce.testAjaxUrl + url;
        }
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: url,
                type: params && params.type || 'GET',
                dataType: params && params.dataType || 'JSON',
                data: data,
                headers: params && params.headers || {},
                success: function(res) {
                    resolve(res)
                },
                error: function(res) {
                    reject(res)
                }
            });
        });
    };
    //дёЉдј ж–‡д»¶е’ЊиЇ·ж±‚token
    var doFile = function(url,data,params){
        if(!httpReg.test(url)){
            url = __ce.baseURL + __ce.filePath + url;
        }
        return new Promise(function(resolve, reject) {
            var par = {
                url: url,
                type: params && params.type || 'GET',
                dataType: params && params.dataType || 'JSON',
                data: data,
                headers: params && params.headers || {},
                success: function(res) {
                    resolve(res)
                },
                error: function(res) {
                    reject(res)
                }
            }
            if(params && params.processData===false){
                par.processData = params.processData
            }
            if(params && params.contentType===false){
                par.contentType = params.contentType
            }
            $.ajax(par);
        });
    };
    return {
        cmsAjax:{
            postJson:postData,
            get:getDate
        },
        doFile:doFile
    }
});


// $.ajax({
//     type: 'POST',
//     url: "http://10.12.52.45:5510/designerprovider/api/form/commitContent?cToken="+cToke+"&captcha="+imgValue+"&instance=NEW2020120109254682563",
//     data:JSON.stringify(json),
//     dataType:"JSON",
//     contentType: 'application/json',
//     success: function(msg){
//         console.log('cheng')
//     },
//     faile:function(res){
//         console.log(res)
//     }
// });