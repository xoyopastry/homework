<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 id="txt">========</h1>
<input type="button" id="btn" value="异步读取">
<script>
    var oTxt = document.getElementById("txt");
    var oBtn = document.getElementById("btn");
    oBtn.onclick = function () {
        var oXhr = new XMLHttpRequest();
        oXhr.onreadystatechange=function () {
            if(oXhr.readyState==4){
                oTxt.innerHTML = oXhr.responseText;
            }
        }
        oXhr.open("GET","a.txt",true);
        oXhr.send(null);}
</script>
</body>
</html>