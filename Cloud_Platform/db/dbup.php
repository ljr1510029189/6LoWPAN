﻿<?php
$xm = $_POST["fxm"];
$nl = $_POST["fnl"];
$xb = $_POST["fxb"];
$xy = $_POST["fxy"];
$xh = $_POST["fxh"];

$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}

// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
mysqli_select_db( $conn, 'student' );


$sql = "UPDATE xuesheng SET
       stuname='$xm',sex='$xb',age='$nl',xueyuanid='$xy' 
	   WHERE xuehao='$xh'";

//执行SQL语句
$re = mysqli_query( $conn, $sql );
if(! $re )
{
    die('修改失败' );
}
echo "修改成功！<a href='show.php'>显示列表</a><br>";

mysqli_close($conn);


?>