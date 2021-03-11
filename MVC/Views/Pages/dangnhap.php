<div>

    <div>
        <?php
            if (isset($_SESSION["error-login"])) {
                echo $_SESSION["error-login"];
            
            }
        ?>
    </div>

    <form action="http://localhost/Vidu/DangNhap/XuLyDangNhap" method="post">
        <div class="form__group">
            <label for="">Tên đăng nhập: </label>
            <input type="text" name="username" id="">
        </div>
        <div class="form__group">
            <label for="">Mật khẩu: </label>
            <input type="password" name="password" id="">
        </div>
        <div class="form__group">
            <input type="submit" value="Đăng nhập" name="login">
        </div>
    </form>

    <div>
        <p>Chưa có tài khoản?</p>
        <a href="http://localhost/Vidu/DangKy">Đăng ký</a>
    </div>
</div>

<style>
    .error-message__login {
        margin: 0;
        color: #691911;
        background-color: #f4d6d2;
        padding: 8px 10px;
        font-size: 15px;
    }

    form {
        margin-top: 20px;
    }
</style>

<script>
    var bodyElement=document.querySelector("body");
    bodyElement.onload=function(e) {
        <?php
            unset($_SESSION["error-login"]);
        ?>
    }
</script>
