<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div{
            color: deeppink;
            height: 40px;
        }
    </style>
</head>
<body>
<form method="get" action="00insert.php">
    <p>姓名：<input type="text" name="xingming"></p>
    <p>身份：<input type="text" name="shenfen"></p>
    <p>性别：
        <input type="radio" name="xingbie" value="保密">保密
        <input type="radio" name="xingbie" value="男">男
        <input type="radio" name="xingbie" value="女">女</p>
    <p>
        <button type="submit" value="添加" >添加</button>
        <button type="submit" value="删除" formaction="00delete.php">删除</button>
        <button type="submit" value="修改" formaction="00update.php">修改</button>
        <button type="submit" value="查询" formaction="00select.php">查询</button></p>
</form>
    <div>将所有信息进行添加</div>
    <div>以姓名检索进行删除</div>
    <div>以姓名检索修改性别</div>
    <div>以性别检索进行查询</div>
</body>
</html>