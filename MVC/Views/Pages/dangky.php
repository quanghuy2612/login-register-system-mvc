<div>
    <form action="http://localhost/Vidu/DangKy/XuLyDangKy" method="post" id="form1">
        <div class="form-group">
            <label for="username">Tên đăng nhập: </label>
            <input type="text" name="username" id="username" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="fullname">Họ và tên: </label>
            <input type="text" name="fullname" id="fullname" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu: </label>
            <input type="password" name="password" id="password" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu: </label>
            <input type="password" name="password" id="password_confirmation" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <input type="submit" name="register" value="Đăng ký">
        </div>
    </form>

    <div>
        <p>Đã có tài khoản</p>
        <a href="http://localhost/Vidu/DangNhap">Đăng nhập</a>
    </div>
</div>

<script>
    var arrUsername=<?php echo $data["arrUsername"]; ?>;
    console.log(arrUsername);
</script>

<script src="./public/js/validator.js"></script>
<script>
    Validator({
            form: "#form1",
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#username'),
                Validator.isSame('#username', arrUsername),
                Validator.isRequired('#fullname'),
                Validator.minLength('#password', 3),
                Validator.isRequired('#password_confirmation'),
                Validator.isConfirmed('#password_confirmation', function() {
                  return document.querySelector('#form1 #password').value;
                })
            ]
        })
</script>

