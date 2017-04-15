<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo "我在北京校区WEB06学习PHP"; ?>
<p>
    请选择出生年份：
    <select name="" id="">
        <?php
            for($1=1900; $i<=2017;$i++){
        ?>
            <option><?php echo $i; ?></option>
        <?php
            }
        ?>
    </select>
</p>
</body>
</html>