<?php
	session_start();
    include 'connect.php';

	if (isset($_SESSION['MSNV'])) 
        $MSNV = $_SESSION['MSNV'];
        $select_msnv = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$MSNV."'";
        $result_msnv = mysqli_query($conn, $select_msnv);
        if ($result_msnv->num_rows > 0)
            while ($rows = mysqli_fetch_assoc($result_msnv)) {
                if ($rows['ChucVu'] == "quanly")
                    $MSNV = $_SESSION['MSNV'];
            }
	else
        header('Location: index.php');
    if (isset($_POST['addspecie'])){
        $addspecie = "INSERT INTO nhomhanghoa VALUES ('".trim($_POST['maloai'])."', '".trim($_POST['tenloai'])."')";
        // echo $addspecie;
        mysqli_query($conn, $addspecie);
        $_SESSION['addspecie']="yes";
        header('Location: product.php');
    }else{
        $_SESSION['addspecie']="no";
        header('Location: product.php');
    }    
?>