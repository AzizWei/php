<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require 'db_open.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $models = $_POST['Models'];
            $bodyDesign = $_POST['BodyDesign'];
            $maxPower = $_POST['MaxPower'];
            $zeroToSixty = $_POST['0_60mph'];
            $topSpeed = $_POST['TopSpeed'];

            $updateQuery = "UPDATE porsche911 SET models = '$models', Body_Design = '$bodyDesign', Max_Power = '$maxPower', 0_60mph = '$zeroToSixty', Top_track_speed = '$topSpeed' WHERE id = '$id'";

            if (mysqli_query($link, $updateQuery)) {
                echo "<script>alert('更新成功');</script>";
            } else {
                echo "<script>alert('更新失敗: " . mysqli_error($link) . "');</script>";
            }

            mysqli_close($link);
        } else {
            $sql = "SELECT * FROM porsche911 WHERE id = '$id'";
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_assoc($result);
                $models = $row['models'];
                $bodyDesign = $row['Body_Design'];
                $maxPower = $row['Max_Power'];
                $zeroToSixty = $row['0_60mph'];
                $topSpeed = $row['Top_track_speed'];
            }
        }
    }
?>

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
                <form id="update"  method="POST" action="update.php?id=<?php echo $id; ?>">
                    <h1>update data</h1>
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
                </form>
               
            </div>
        </div>
    </section>
    

    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>