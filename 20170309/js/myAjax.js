/**
 * Created by Administrator on 2017/3/9.
 */
(function () {
    //唯一向外层暴露的顶层变量
    var myajax = window.myajax = {};
    //作者、版本号等信息
    myajax.author = "Maxwell";
    myajax.version = "1.0.0";
    
    myajax.get = function (URL,queryJSON,callback) {
        if(window.XMLHttpRequest){
            var xhr = new XMLHttpRequest();
        }else{
            var xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function () {
            if(xhr.readyState==4){
                if (xhr.status >= 200 && xhr.status < 300 || xhr.status == 304){
                    callback(null,xhr.responseText);
                }else{
                    callback(new Error("对不起，没有找到你请求的文件"),undefined);
                }
            }
        }
        //{name:'t',age:18}  => name=t&age=18
        var queryString = myajax._queryjson2querystring(queryJSON);
        xhr.open("GET",URL+"?"+queryString,true);
        xhr.send(null);
    };

    myajax.post = function () {
        if(window.XMLHttpRequest){
            var xhr = new XMLHttpRequest();
        }else{
            var xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }
        xhr.onreadystatechange = function () {
            if(xhr.readyState==4){
                if (xhr.status >= 200 && xhr.status < 300 || xhr.status == 304){
                    callback(null,xhr.responseText);
                }else{
                    callback(new Error("对不起，没有找到你请求的文件"),undefined);
                }
            }
        }
        xhr.open("POST",URL,true);
        var querystring = queryJSON;
        // if (typeof ){}
        var querystring = myajax._queryjson2querystring(queryJSON);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhr.send(querystring);
    };

    //内部函数，查询json变为查询字符串
    //输入一个{"name":"max","age":18,"sex":"男"}
    //返回一个name=max&age=18&sex=%E8%C6%B6
    myajax._queryjson2querystring = function(json) {
        /*for (var k in json){
            result += k+"="+encodeURIComponent(json[k]);
        }
        return result;*/

        var arr = [];//结果数组
        for (var k in json) {
            arr.push(k + "=" + encodeURIComponent(json[k]));
        }
        return arr.join("&");
    }
})();