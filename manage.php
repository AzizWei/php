<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/manage.css">
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
    <section id="manege">
        <div class="sidebar">
            <ul>
                <li><a href="#"><i class="fa-solid fa-bars-progress"></i>Index</a></li>
                <li><a href="#"><i class="fa-solid fa-database"></i>Database</a></li>
                <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>
            </ul>
        </div>
        <div class="content_wrapper">
            <div class="logintime">Login Time:</div>
            <div class="WelcomeText">Welcome to Management system</div>
            <div class="content">
                <div class="btnGroup">
                    <a href="#" class="btn">Search data</a>
                    <a href="#" class="btn">insert data</a>
                </div>
                <form>                  
                    <div class="inputGroup">
                        <input type="text" class="Search" placeholder="Search" name="Search">
                        <a href="#" class="btn fa-solid fa-magnifying-glass"></a>
                    </div>    
                </form>
            </div>
            <!-- data -->
        </script>
        </div>
    </section>


    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>