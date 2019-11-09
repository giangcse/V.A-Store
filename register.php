<?php
    include 'connect.php';

    if(isset($_POST['buttonRegister'])){
        $username = strtolower(trim($_POST['unameRegister']));
        $password = sha1($_POST['upassRegister']);
        $fullname = trim($_POST['fullnameRegister']);
        $phone = $_POST['phoneRegister'];
        $address = trim($_POST['addressRegister']);

        $check_username = "SELECT TaiKhoan FROM taikhoankhachhang WHERE TaiKhoan='".$username."'";
        $check_query = mysqli_query($conn, $check_username);
        if($check_query->num_rows > 0){
            echo '<script>alert("Tài khoản đã tồn tại.");</script>';
            header('Location: index.php');
        }else{
            $max_id = "SELECT MAX(CAST(MSKH AS INT)) AS maxid FROM khachhang";
            $max_result = mysqli_query($conn, $max_id);
            if($max_result->num_rows>0){
                while($row=mysqli_fetch_assoc($max_result)){
                    if($row['maxid'] == "")
                        $maxid = 0;
                    else
                        $maxid = intval($row['maxid']) + 1;
                }
            }
            $add_user = "INSERT INTO khachhang VALUES('".$maxid."', '".$fullname."', '".$address."', '".$phone."')";
            $add_useraccount = "INSERT INTO taikhoankhachhang VALUES('".$maxid."', '".$username."', '".$password."')";
            $add_user_query = mysqli_query($conn, $add_user);
            $add_useraccount_query = mysqli_query($conn, $add_useraccount);
            if ($add_user_query && $add_useraccount_query)
                header('Location: index.php');
            // echo $add_customer;
            // echo $add_user;
        }
    }
?>