<?php
print_r($_GET);
//$a1 = $_GET['xingming'];
//$a2 = $_GET['shenfen'];
$a3 = $_GET['xingbie'];
$con = mysqli_connect('localhost','root','','mydb');
mysqli_query($con,"SET NAMES UTF8");
$sql1 = "SELECT * FROM survey1 WHERE xingbie = '{$a3}'";
$result = mysqli_query($con,$sql1);
//mysqli_close($con);
?>
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
<select name="" id="">
    <option <?php if($a3=="保密"){echo "selected";} ?> value="保密">保密</option>
    <option <?php if($a3=="男"){echo "selected";} ?> value="男">男</option>
    <option <?php if($a3=="女"){echo "selected";} ?> value="女">女</option>
</select>
<script>
    var oSelect = document.getElementsByTagName("select")[0];
    oSelect.onchange = function(){
//        alert(this.value);
        //改变网址
        window.location = "00select.php?xingbie=" + this.value;
    }
</script>
<!--table>tr*2>td*3-->
<table>
    <tr>
        <td>姓名</td>
        <td>身份</td>
        <td>性别</td>
    </tr>
    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['xingming'] ?></td>
            <td><?php echo $row['shenfen'] ?></td>
            <td><?php echo $row['xingbie'] ?></td>
        </tr>
        <?php
    }
    mysqli_close($con);
    ?>
</body>
</html>
