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
<?php
for ($i=0;$i<100;$i++){
?>    
    <p>
        <input type="<?php echo ($i % 5 == 0) ? 'radio' : 'text' ?>">
    </p>
    <?php
}
    ?>
</body>
</html>
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/6
 * Time: 16:01
 */