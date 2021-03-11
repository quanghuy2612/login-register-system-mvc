<?php
    class TaiKhoanModel extends DB {
        function getTaiKhoanLogin($username, $password) {
            $qr="SELECT * FROM taikhoan WHERE username=? AND password=?";
            $stmt=$this->conn->prepare($qr);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $row=$result->fetch_assoc();
            return $row["hoten"];
        }

        function getAllUsername() {
            $qr="SELECT username FROM taikhoan";
            $result=$this->conn->query($qr);
            $arr=[];
            while($rows=$result->fetch_assoc()) {
                array_push($arr, $rows["username"]);
            }
            return json_encode($arr);
        }

        function InsertTaiKhoan($username, $password, $fullname) {
            $qr="INSERT INTO taikhoan (username, password, hoten) VALUES ('$username', '$password', '$fullname')";
            $this->conn->query($qr);
        }
    }
?>