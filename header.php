<?php
    session_start();
    if (!isset($_SESSION['sAccount']))  
	header('Location: login.php');      //導向login的頁面
?>
<!-- start -->
<header class="header">
    <a href="#"class="fa-solid fa-rocket logo" id="logo">
    </a>                
    <a class="fa-solid fa-user-group" id="menu"  ></a>
</header>
<!-- fontawesome-->
<script src="https://kit.fontawesome.com/de998ff9a0.js" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function redirectDialog(filename, mode, msg) {
        alert(msg);

        location.replace(filename + "?mode=" + mode);
    }        
    function deleteConfirm(filename, id) {
                if (confirm("警告：\n  確定刪除編號為 " + id + " 的資料嗎?") == 1)
                    location.replace(filename + "?mode=delete&id=" + id);
                else
                    return false;
            }


    function validateForm() {
        var models = document.getElementById('Models').value;        // 取得輸入欄位的值
        var bodyDesign = document.getElementById('BodyDesign').value;
        if (models === '' || bodyDesign === '') {        // 檢查輸入是否為空
            alert('輸入欄位不能為空');
            return false; // 阻止表單提交
        }
        return true; // 允許表單提交
    }

    function validateForm() {
        var maxPower = document.getElementById('MaxPower').value;
        var zeroToSixty = document.getElementById('0_60mph').value;
        var topSpeed = document.getElementById('TopSpeed').value;

        // 使用正則表達式檢查是否為數字或浮點數
        var numberRegex = /^-?\d+(\.\d+)?$/;

        if (!numberRegex.test(maxPower) || !numberRegex.test(zeroToSixty) || !numberRegex.test(topSpeed)) {
            alert('輸入的數值格式不正確，請輸入數字。');
            return false;
        }

        return true;
    }
    </script>    