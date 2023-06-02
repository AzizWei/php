<?php 
    session_start();
    require 'db_open.php';
    $varErrmessage="";

    if (isset($_GET['st'])){ //logout 時會給的變數
        if ($_GET['st']=="logout"){
            unset($_SESSION['sAccount']);}}
    
      if (isset($_POST['usrAccount'])) { //使用者輸入帳號後，帳號密碼的判斷
         $varAccount=$_POST['usrAccount'];
         $varPassword=$_POST['usrPassword'];
         $sql = "SELECT * FROM `member` where musername='$varAccount'"; // 指定SQL查詢字串
         $result = mysqli_query($link, $sql);
         if (mysqli_num_rows($result) == 0)
             {$varErrmessage ="請輸入正確帳號".mysqli_error($link);}
         else
           { $row = mysqli_fetch_assoc($result);	 	 
            if ($varPassword==$row['passwd']){
                $_SESSION['sAccount']=$varAccount;
                $_SESSION['sname']=$row['mname'];
                $_SESSION['sLogintime']=date("Y-m-d H:i:s");
                $sql = "update member set lastlogindatetime = '".$_SESSION['sLogintime']."' where mid='$varAccount'"; // 指定SQL查詢字串
                echo $sql;
                $result = mysqli_query($link, $sql);			
                mysqli_close($link);  // 關閉資料庫連接
                header('Location: index.php');}
            else
                $varErrmessage ="請輸入正確密碼";
            }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/login.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <!-- fontawesome-->
    <script src="https://kit.fontawesome.com/de998ff9a0.js" crossorigin="anonymous"></>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- using animate.css -->
    <div id="filter">
        <h1 class=" animate__bounceOut">Welcome</h1>
    </div>
    <!-- header -->
    <?php include 'header.php'; ?>
    
    <!-- 內容 -->
    <section id="login">
        <div class="loginbox">
            <div class="title">Login</div>
            <form method="POST" action="login.php">
                <div class="input_box">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="username" name = "usrAccount" placeholder="Username" required>
                </div>
                <div class="input_box">
                    <span class="icon">
                        <i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" class="password" name="usrPassword" placeholder="Password" required>
                </div>
                <div class="btn_group">
                    <button class="btn" type="reset">Reset</button>
                    <button class="btn" type="submit">Submit</button>
                </div>
                <div><?=$varErrmessage?></div>
                <div class="more_info">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    <a href="#" class="Signup"> Sign up</a>
                </div>
            </form>
        </div>
    </section>
    <script src="./js/outside.js"></script>
    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>