<?php
// 建立MySQL的資料庫連接 
$link = mysqli_connect("localhost","root",
                       "12345678","porsche")
        or die("Can not open MySQL database!<br/>");
mysqli_query($link, "set names 'UTF8' ");?>