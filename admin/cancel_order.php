<?php
    session_start();
    include 'connect.php';

	if (isset($_SESSION['MSNV'])){ 
        $MSNV = $_SESSION['MSNV'];
        $select_msnv = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$MSNV."'";
        $result_msnv = mysqli_query($conn, $select_msnv);
        if ($result_msnv->num_rows > 0)
            while ($rows = mysqli_fetch_assoc($result_msnv)) {
                if ($rows['ChucVu'] == "quanly"){
                    if (isset($_GET['id'])) {
                        $cancel_sql = "UPDATE dathang SET TrangThai='canceled' WHERE SoDonDH = '".$_GET['id']."'";
                        $cancel_query = mysqli_query($conn, $cancel_sql);
                    }
                }  
            }
    }else
		header('Location: index.php');
?>