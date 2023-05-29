<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/login.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <!-- fontawesome-->
    <script src="https://kit.fontawesome.com/de998ff9a0.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- 進場動畫 using animate.css -->
    <div id="filter">
        <h1 class=" animate__bounceOut">Welcome</h1>
    </div>
    <script>
        var timer = setTimeout(function(){
            let filter=document.getElementById("filter");
            filter.style.display="none"
            clearTimeout(timer); 
        },1200);
    </script>
    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- 內容 -->
    <section id="login">
        <div class="loginbox">
            <div class="title">Login</div>
            <form action="GET">
                <div class="input_box">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="username" placeholder="Username" required>
                </div>
                <div class="input_box">
                    <span class="icon">
                        <i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" class="password" placeholder="Password" required>
                </div>
                <div class="btn_group">
                    <button class="btn" type="reset">Reset</button>
                    <button class="btn" type="submit">Submit</button>
                </div>
                <div class="more_info">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    <a href="#" class="Signup"> Sign up</a>
                </div>
            </form>
        </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>