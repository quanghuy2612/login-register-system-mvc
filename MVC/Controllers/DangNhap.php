<?php
    class DangNhap extends Controller {
        function __construct() {
            $this->view("layout2", [
                "Page" => "dangnhap"
            ]);
        }

        function XuLyDangNhap() {
            if (isset($_POST["login"])) {
                $username=$_POST["username"];
                $password=$_POST["password"];

                $result=$this->model("TaiKhoanModel")->getTaiKhoanLogin($username, $password);

                if ($result) {
                    $_SESSION["fullname"]=$result;
                    header("Location: http://localhost/Vidu/Home");
                }
                else {
                    $_SESSION["error-login"]="
                        <p class='error-message__login'> Đăng nhập sai, xin vui lòng thử lại </p>
                    ";
                    header("Location: http://localhost/Vidu/DangNhap");
                }
            }
        }
    }
?>  