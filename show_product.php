<?php
	ob_start();
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	function show($ma_nhom)
	{		
		include 'connect.php';

			$gaming_select = "SELECT * FROM hanghoa WHERE MaNhom = '".$ma_nhom."' GROUP BY Gia";
      $result = mysqli_query($conn, $gaming_select);

      if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
          $Gia= number_format($row['Gia'], 0);
          $MoTa = substr($row['MoTaHH'], 0, 50).'...';
          $Ten = substr($row['TenHH'], 0, 30).'...';
?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/plus_minus.css">
<div class="col-md-3">
  <a data-toggle="modal" data-target="#<?php echo $row['MSHH']; ?>" class="custom-card">
  <div class="card mb-4 shadow-sm" style="display: inline-block">
    <img class="card-img-top" src="img/product/<?php echo $row['Hinh']; ?>">
    <div class="card-body">
      <h5 class="card-title"><?php echo $Ten; ?></h5>
      <p class="card-text" id="currency" style="color: green;"><?php echo $Gia; ?> đ</p>
      <div class="d-flex justify-content-between align-items-center">
        <small class="text-muted" style="color: red;"><?php echo $MoTa; ?></small>
      </div>
    </div>
  </div>
  </a>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="<?php echo $row['MSHH']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['TenHH']; ?></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <img src="img/product/<?php echo $row['Hinh']; ?>" alt="<?php echo $row['MSHH']; ?>" width="500" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-md-6">
            <h3><?php echo $row['TenHH']; ?></h3>
            <h5 style="color: green;"><?php echo $Gia; ?> đ</h5>
            <h6>Mô tả sản phẩm</h6>
            <p><?php echo $row['MoTaHH']; ?></p>
            <h5 style="color: red;">Còn <?php echo $row['SoLuongHang']; ?> sản phẩm</h5>
          <form method="get" action="addcart.php">
           <div class="def-number-input number-input safari_only">
      		  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" type="button" ></button>
      		  <input class="quantity" min="0" name="quantity" id="quantity" value="1" type="number">
      		  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" type="button" ></button>
      		 </div>
           <button type="submit" name="MSHH" class="btn btn-danger" value="<?php echo $row['MSHH']; ?>">Thêm vào giỏ</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
  </div>
</div>
</div>
    <?php 
       }
      }
    }
 ob_end_clean();
?>