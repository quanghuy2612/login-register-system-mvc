<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #layout1 {
            width: 100%;
            height: 100px;
            background-color: #b74b4b;
        }
    </style>
</head>
<body>
    <div id="layout1"></div>

    <div>
        <?php
            if (isset($_SESSION["fullname"])) {
                echo "<p> Hello <b><i> {$_SESSION["fullname"]} </b></i></p>";
                echo "
                    <a href='http://localhost/Vidu/Unset'>Đăng xuất</a>
                ";
            }   
            else {
                echo "
                    <div>
                        <a href='http://localhost/Vidu/DangNhap'>Đăng nhập</a>
                    </div>
                ";
                echo "
                    <div>
                        <a href='http://localhost/Vidu/DangKy'>Đăng ký</a>
                    </div>
                ";
            }
        ?>
    </div>

    <div>
        <?php
            require_once "./MVC/Views/Pages/{$data['Page']}.php";
        ?>
    </div>
</body>
</html>