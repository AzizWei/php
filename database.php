<?php
    // 建立MySQL的資料庫連接 
    require 'db_open.php';
    $sql = "SELECT * FROM porsche911 order by id asc"; // 查詢將從 "porsche911" 表格中選擇所有列，按照 "id" 列的升序排序
    $records_per_page = 15;  // 每一頁顯示的記錄筆數
    // 取得URL參數的頁數
    if (isset($_GET["page"])) $page = $_GET["page"];
    else                       $page = 1;

    // 如果 URL 參數中存在 "page"，則將其值賦給 $page 變數，否則將 $page 設置為 1（預設為第一頁）。

    if ( $result = mysqli_query($link, $sql)) { 
        $total_records=mysqli_num_rows($result);  // 取得記錄數
        $total_pages = ceil($total_records/$records_per_page); // 計算總頁數取整數
        // 計算這一頁第1筆記錄的位置
        $offset = ($page - 1)*$records_per_page;
        mysqli_data_seek($result, $offset);} // 移到此記錄  
?>     
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/database.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <!-- fontawesome-->
    <script src="https://kit.fontawesome.com/de998ff9a0.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- 內容 -->
    <section id="manage">
        <?php include 'sidebar.php'?>
        <div class="content_wrapper">
            <div class="logintime">Hi! <?=$_SESSION['sname']?>Login Time:<?=$_SESSION['sLogintime']?></div>
            <div class="content">
                <div class="pageGroup">
                    <a href="database.php" class="btn">Search data</a>
                    <a href="insert.php" class="btn">insert data</a>
                </div>

                <!--search data -->
                <?php
                    $searchKeyword = "";

                    if (isset($_GET['Search'])) {    //檢查是否有抓到搜索的關鍵字
                        $searchKeyword = $_GET['Search'];

                        // 使用 SQL 查詢來搜索 MySQL 資料庫
                        $sql = "SELECT * FROM porsche911 WHERE models LIKE '%{$searchKeyword}%' OR Body_Design LIKE '%{$searchKeyword}%' OR Max_Power LIKE '%{$searchKeyword}%' OR 0_60mph LIKE '%{$searchKeyword}%' OR Top_track_speed LIKE '%{$searchKeyword}%'" ;
                    } else {
                        // 沒有搜尋關鍵字，顯示全部資料
                        $sql = "SELECT * FROM porsche911 ORDER BY id ASC";
                    }
                    $result = mysqli_query($link, $sql);  // 執行 SQL 查詢並獲取結果
                    $total_records = mysqli_num_rows($result); // 取得記錄數
                    $total_pages = ceil($total_records / $records_per_page); // 計算總頁數取整數

                    // 取得URL參數的頁數
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    }

                    // 計算這一頁第1筆記錄的位置
                    $offset = ($page - 1) * $records_per_page;

                    // 移到此記錄  
                    mysqli_data_seek($result, $offset);
                ?>

                <form id="searchInput" method="GET" action="database.php" >                  
                    <div class="inputGroup">
                        <input type="text" class="Search" placeholder="Models Search" name="Search">
                        <button type="submit" class="btn fa-solid fa-magnifying-glass"></button>
                    </div>
                </form>

                <table class="datamsg">
                    <thead>
                        <tr>
                            <th>Models</th>
                            <th>Body Design</th>
                            <th>Max Power (hp)</th>
                            <th>0-60mph</th>
                            <th>Top track speed (mph)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['mode'])){
                            $mode = $_GET['mode'];

                            switch ($mode) {
                                case "delete":
                                    $id = $_GET['id'];
                                    $mode = "browse";
                                    require 'db_open.php';
                                    $sql = "delete FROM porsche911 where id='".$id."'"; 

                                    if ($result = mysqli_query($link, $sql)) {
                                        echo "<script>redirectDialog('$ThisFileName','$mode', '資料已刪除!');</script>";
                                    } else {
                                        echo "<script>redirectDialog('$ThisFileName', '$mode', '刪除失敗');</script>";
                                    }
                                    break;

                                case "update":
                                    $id = $_GET['id'];
                                    $mode = "browse";
                                    require 'db_open.php';
                                    $sql = "update FROM porsche911 where id='".$id."'"; 


                                    break;

                            }}
                        ?>
                        <?php 
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result) and $i <= $records_per_page) { 
                                echo "<tr>\n";
                                echo "<td>".$row["models"]."</td>\n";
                                echo "<td>".$row["Body_Design"]."</td>\n";
                                echo "<td>".$row["Max_Power"]."</td>\n";
                                echo "<td>".$row["0_60mph"]."</td>\n";
                                echo "<td>".$row["Top_track_speed"]."</td>\n";
                                echo "<td><a href=\"update.php?mode=update&id=".$row['id']."\" class='btn'><i class='fa-solid fa-pen-to-square'></i></a>";
                                echo  "<a  class='btn' onclick=\"javascript:deleteConfirm('database.php', '".$row["id"]."')\"><i class='fa-solid fa-trash'></i></a></td>\n";
                                echo "</tr>"; 
                                $i++;
                            }     
                        ?>

                    </tbody>
                </table>
        
                <div class="pageRow">
                    <?php
                        echo "<tr>\n";
                        echo "<td>\n";
                        if ($page > 1) {  // 顯示上一頁
                            echo "<a href='database.php?page=".($page-1)."' style=\"color: #000\">previous</a>| ";
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i != $page) {
                                echo "<a href=\"database.php?page=".$i."\" style=\"color: #000\";>".$i."</a> ";
                            } else {
                                echo $i." ";
                            }
                        }
                        if ($page < $total_pages) {   // 顯示下一頁
                            echo "|<a href='database.php?page=".($page+1)."' style=\"color: #000\">next</a> ";
                        }
                        echo "</td>\n";
                        echo "</tr>";
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>