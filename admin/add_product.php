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

	if (isset($_POST['add'])) {
		if ($_POST['ten']!="" || $_POST['gia']!="" || $_POST['loai']!="" || $_POST['hinh']!="" || $_POST['soluong']!="") {
			$ma_sp = $_POST['loai'];

			$so_sp_select = "SELECT COUNT(MSHH) as sosp FROM hanghoa WHERE MaNhom = '".$_POST['loai']."'";
            $so_sp_query = mysqli_query($conn, $so_sp_select); //Thực hiện truy vấn đếm dựa vào id
            $so_sp_fetch = mysqli_fetch_assoc($so_sp_query);
            $so_sp = $so_sp_fetch['sosp'];
			$so_sp = $so_sp + 1;
			$mahh = $ma_sp.$so_sp;

			#Upload image
			$status = 1;
			$img_dir = "../img/product/";
			$img_file = $img_dir.basename($_FILES['hinh']['name']); //Tao duong dan + ten file anh
			$imgType = strtolower(pathinfo($img_file, PATHINFO_EXTENSION)); //Kiem tra dinh dang gile
			#Kiem tra file co phai la hinh anh
			if (isset($_POST['hinh'])) {
				$check = getimagesize($_FILES['hinh']['tmp_name']);
				if ($check !== false) {
					$status = 1;
				}else{
					$_SESSION['upload'] = "notImg";
					$status = 0;
				}
			}

			#Kiem tra file da ton tai chua
			if (file_exists($img_file)) {
				$_SESSION['upload'] = "exist";
				$status = 0;
			}

			#Kiem tra file, gioi han dung luong anh 2.5MB
			if ($_FILES['hinh']['size'] > 2500000) {
				$_SESSION['upload'] = "large";
				$status = 0;
			}

			#Kiem tra loai file anh, cho phep upload dinh dang jpg, jpeg, png, gif
			if ($imgType != 'jpg' && $imgType != 'jpeg' && $imgType != 'png' && $imgType != 'gif') {
				$_SESSION['upload'] = "notImg";
				$status = 0;
			}

			#Kiem tra trang thai truoc khi upload
			if ($status == 0) {
				$_SESSION['upload'] = "failed";
			}else{
				if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $img_file)) {
					$add = "INSERT INTO hanghoa VALUE ('".$mahh."', '".trim($_POST['ten'])."', '".$_POST['gia']."', '".$_POST['soluong']."', '".$_POST['loai']."', '".basename($_FILES["hinh"]["name"])."', '".$_POST['mota']."')";
					$add_query = mysqli_query($conn, $add);
					// echo $add;
					$_SESSION['upload'] = "success";
				}else{
					$_SESSION['upload'] = "failed";
				}
			}
		}
	}
	header('Location: product.php');
?>