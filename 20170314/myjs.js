/**
 * Created by Administrator on 2017/3/14.
 */
(function(){
    var j = window.j={}//唯一向外暴露的顶层变量
    j.author = "Maxwell";//作者
    j.version = "1.0.0";//版本号

    j.fetchComputed




    //这个对象有两个属性，get, post属性，值是函数
    j.get = function(URL, queryJSON, callback){
        if (window.XMLHttpRequest) {
            var xhr = new XMLHttpRequest();
        } else {
            var xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                if (xhr.status >= 200 && xhr.status < 300
                    || xhr.status == 304) {
                    callback(null, xhr.responseText);
                } else {
                    callback(new Error("没有找到请求的文件"),
                        undefined);
                }
            }
        }
        // {name:'t',age:18}  => name=t&age=18
        var queryString = queryJSON;
        if (typeof queryJSON == "object") {
            queryString =
                myajax._queryjson2querystring(queryJSON);
        }
        xhr.open("GET", URL+"?"+queryString, true);
        xhr.send(null);
    };

    j.post = function(URL, queryJSON, callback) {
        if (window.XMLHttpRequest) {
            var xhr = new XMLHttpRequest();
        } else {
            var xhr =new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                if (xhr.status >= 200 && xhr.status < 300
                    || xhr.status == 304) {
                    callback(null, xhr.responseText);
                } else {
                    callback(new Error("没有找到请求的文件"), undefined);
                }
            }
        }
        xhr.open("POST", URL, true);
        var queryString = queryJSON;
        if (typeof queryJSON == "object") {
            queryString =
                myajax._queryjson2querystring(queryJSON);
        }
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(queryString);
    };

    //内部函数，查询json变为查询字符串
    //输入一个{"name":"max","age":18,"sex":"男"}
    //返回一个name=max&age=18&sex=%E8%C6%B6
    j._queryjson2querystring = function(json) {
        /*
         var result = "";
         for (var k in json) {
         result += k+"="+encodeURIComponent(json[k])+"&";
         }
         return result;
         */
        var arr = [];//结果数组
        for (var k in json) {
            arr.push(k + "=" + encodeURIComponent(json[k]));
        }
        return arr.join("&");
    }

})();