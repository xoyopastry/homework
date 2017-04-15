<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>20170307作业</title>
</head>
<body>
<form method="post" action="0308insert.php">
    <p>
        你今天的状态是：
        <input type="radio" name="answer1" value="非常明白"> 非常明白
        <input type="radio" name="answer1" value="比较明白">比较明白
        <input type="radio" name="answer1" value="一般">一般
        <input type="radio" name="answer1" value="懵">懵
    </p>
    <p>
        你觉得老师应该：
        <input type="radio" name="answer2" value="再快一点"> 再快一点
        <input type="radio" name="answer2" value="刚刚好"> 刚刚好
        <input type="radio" name="answer2" value="再慢一点"> 再慢一点
    </p>
    <p>
        你的意见和建议：
        <textarea name="answer3" id="" cols="30" rows="10"></textarea>
    </p>
    <p>
        <input type="submit">
    </p>
</form>
</body>
</html>