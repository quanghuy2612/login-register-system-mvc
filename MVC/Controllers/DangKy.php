<?php
    class DangKy extends Controller {
        function __construct() {
            $this->view("layout2", [
                "Page" => "dangky",
                "arrUsername" => $this->model("TaiKhoanModel")->getAllUsername()
            ]);
        }

        function XuLyDangKy() {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $fullname=$_POST["fullname"];

            $this->model("TaiKhoanModel")->InsertTaiKhoan($username, $password, $fullname);
            $_SESSION["fullname"]=$_POST["fullname"];
            header("Location: http://localhost/Vidu/Home");
        }
    }
?>  