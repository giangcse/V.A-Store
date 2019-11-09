<?php
    session_start();
    include 'connect.php';
  
  if (isset($_SESSION['MSNV'])){ 
        $MSNV = $_SESSION['MSNV'];
        $select_msnv = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$MSNV."'";
        $result_msnv = mysqli_query($conn, $select_msnv);
        if ($result_msnv->num_rows > 0)
            while ($rows = mysqli_fetch_assoc($result_msnv)) {
                if ($rows['ChucVu'] == "quanly")
                  $MSNV = $_SESSION['MSNV'];
            }
        }else
    header('Location: index.php');
    
    if(isset($_POST['update'])){
        $select = "SELECT * FROM nhanvien INNER JOIN taikhoannhanvien ON nhanvien.MSNV = taikhoannhanvien.MSNV WHERE nhanvien.MSNV = '".$_POST["update"]."'";
        $select_query = mysqli_query($conn, $select);
        if ($select_query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($select_query)) {
                $sdt = $row['SoDienThoai'];
                $diachi = $row['DiaChi'];
                $chucvu = $row['ChucVu'];
                $matkhau = $row['MatKhau'];
            }
        }
        if ($_POST['sdt']== "")
            $_POST['sdt'] = $sdt;
        if ($_POST['diachi'] == "")
            $_POST['diachi'] = $diachi;
        if ($_POST['chucvu'] == "")
            $_POST['chucvu'] = $chucvu;
        if ($_POST['matkhau'] == "")
            $_POST['matkhau'] = $matkhau;

        $_POST['sdt'] = trim($_POST['sdt']);
        $_POST['diachi'] = trim($_POST['diachi']);
        $_POST['chucvu'] = trim($_POST['chucvu']);
        $_POST['matkhau'] = sha1($_POST['matkhau']);
        $update = "UPDATE nhanvien SET SoDienThoai='".$_POST['sdt']."', DiaChi='".$_POST['diachi']."', ChucVu='".$_POST['chucvu']."' WHERE MSNV = '".$_POST["update"]."'";
        $update_query = mysqli_query($conn, $update);
        $update2 = "UPDATE taikhoannhanvien SET MatKhau = '".$_POST['matkhau']."' WHERE MSNV = '".$_POST["update"]."'";
        $update2_query = mysqli_query($conn, $update2);
        header('Location: employee.php');
        // echo $update;
    }
?>