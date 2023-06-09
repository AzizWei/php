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
            <div class="WelcomeText">Welcome to Management system!
            <p>As the creator is a passionate enthusiast of <span class="name"> Porsche 911 model</span>, this website and database were developed to showcase their love for it. However, it is important to note that <span class="note">all content provided is for educational purposes only and should not be used for commercial purposes.</span></p>
            <p>This is a database specifically created for the<span class="name"> Porsche 911 model</span>. It provides a concise compilation of various series, designs, horsepower, 0-60mph and top track speed (mph).</p>
            <p> Upon logging in, authorized users are granted privileges to add or delete content within this database.</p>
            </div>
            <img src="./images/Carrera_4GTS_Cabriolet.png" alt="Carrera_4GTS_Cabriolet">
        </div>
    </section>


    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>