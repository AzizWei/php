    
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/database.css">
    <?php include 'head.php'; ?>
</head>
<body>
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
                <!-- insert data -->
                <form id="insert"  method="GET" action="insert.php"  onsubmit="return validateForm()">
                    <h1>Insert into Database</h1>
                    <div class="inputGroup">
                        <label for="Models">Models</label>
                        <input type="text" name="Models" id="Models" placeholder="Carrera">
                    </div>
                    <div class="inputGroup">
                        <label for="BodyDesign">Body Design</label>
                        <input type="text" name="BodyDesign" id="BodyDesign"  placeholder="Coupe">
                    </div>
                    <div class="inputGroup">
                        <label for="MaxPower">Max Power</label>
                        <input type="text" name="MaxPower" id="MaxPower" placeholder="379">
                    </div>
                    <div class="inputGroup">
                        <label for="0_60mph">0-60mph</label>
                        <input type="text" name="0_60mph" id="0_60mph" placeholder="4">
                    </div>
                    <div class="inputGroup">
                        <label for="TopSpeed">Top track speed (mph)</label>
                        <input type="text" name="TopSpeed" id="TopSpeed" placeholder="182">
                    </div>
                    <div class="btn_group">
                        <button class="btn" type="reset"><i class="fa-solid fa-xmark"></i> Reset</button>
                        <button class="btn" type="submit"><i class="fa-solid fa-check"></i> Submit</button>
                    </div>

                    <?php
                        require 'db_open.php';
                        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                            if (isset($_GET['Models']) && isset($_GET['BodyDesign']) && isset($_GET['MaxPower']) && isset($_GET['0_60mph']) && isset($_GET['TopSpeed'])) {

                                $models = $_GET['Models'];
                                $bodyDesign = $_GET['BodyDesign'];
                                $maxPower = $_GET['MaxPower'];
                                $zeroToSixty = $_GET['0_60mph'];
                                $topSpeed = $_GET['TopSpeed'];

                                $sql = "INSERT INTO porsche911 (models, Body_Design, Max_Power, 0_60mph, Top_track_speed) 
                                        VALUES ('$models', '$bodyDesign', '$maxPower', '$zeroToSixty', '$topSpeed')";


                                if (mysqli_query($link, $sql)) {
                                    echo "<script>alert('新增成功');</script>";
                                } else {
                                    echo "<script>alert('新增失敗: " . mysqli_error($link) . "');</script>";
                                }

                                // 從資料庫中獲取新增的資料
                                $selectlastone = "SELECT * FROM porsche911 ORDER BY id DESC LIMIT 1";
                                $result = mysqli_query($link, $selectlastone);

                                if (mysqli_num_rows($result) > 0) {
                                    echo "<table class='datamsg'>";
                                    echo "<tr><th>Models</th><th>Body Design</th><th>Max Power</th><th>0-60mph</th><th>Top track speed (mph)</th></tr>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['models'] . "</td>";
                                        echo "<td>" . $row['Body_Design'] . "</td>";
                                        echo "<td>" . $row['Max_Power'] . "</td>";
                                        echo "<td>" . $row['0_60mph'] . "</td>";
                                        echo "<td>" . $row['Top_track_speed'] . "</td>";
                                        echo "</tr>";
                                    }

                                    echo "</table>";
                                }

                                // 關閉資料庫連接
                                mysqli_close($link);
                            }
                        }
                    ?>
                </form>
               
            </div>
        </div>
    </section>
    

    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>