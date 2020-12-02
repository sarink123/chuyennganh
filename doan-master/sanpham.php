<?php include('lib\server.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE html>
<html><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>TỒN KHO- QUẢN LÝ KHO</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styleindex.css">
<link rel="stylesheet" href="style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>

</style>
</head> 
	<body>
		<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="<?php if($_SESSION['admin']==0) echo "trangnv.php"; else  echo "trangadmin.php"; ?>" class="navbar-brand"><i class="fa fa-cube"></i>HOME</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Collection of nav links, forms, and other content for toggling -->
				<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
					
					<div class="navbar-nav ml-auto" style="padding-right: 100px">
						
						<form class="navbar-form form-inline" action="<?php if($_SESSION['admin']==0) echo "trangnv.php"; else  echo "trangadmin.php"; ?>" method="get">
							<div class="input-group search-box">
								<input type="text" id="search" class="form-control" placeholder="Search here..." name="tt">
								
								<button type="submit" name="search" class="btn btn-info" style="background-color: black">Tìm kiếm</button>
							</div>
						</form>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action" style="color: white"><?php 
								 if($_SESSION['logged']==true){
													if($_SESSION['admin']==0){
													echo "Nhân viên ";
													echo $_SESSION['username'];
												}
												else{
													echo "Quản Lý ";
													echo $_SESSION['username'];
												}	
											}
								?> <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item">Profile</a>
					<a href="matkhau_2.php" class="dropdown-item">Change Password</a>
					<div class="divider dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
				</div>
			</div>
		</div>
	</div>
</nav>
	<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="width: auto;">
		<ul id="menuleftul">

			<li><h5 class="dropdown-header">Kho quản lý</h5></li>
			<li><a href="sanpham.php" class="dropdown-item" >Tồn kho</a></li>
			<li><a href="nhaphanphoi.php" class="dropdown-item" >Nhà phân phối</a></li><li><a href="#" class="dropdown-item" >Nhập kho</a></li>
			<li><a href="#" class="dropdown-item" >Xuất kho</a></li>
			<li><a href="chinhanh.php" class="dropdown-item" >Cửa hàng </a></li>

		</ul>
	</nav>
	<div style="margin-left: 25%">
	<article id="box">
		<table class="w3-table-all w3-hoverable">
			<?php echo "<h1>TỒN KHO</h1> <hr>" ?>
			<thead>
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Loại vải </th>
					<th>Số Lượng</th>
					<th>Đơn giá</th>
					<th>Tên nhà phân phối</th>
				</tr>
				<?php 
				$sql="SELECT * FROM goods join type on type_id=type join distributor on distributor.id=distributor_id";
				$query = $conn->query($sql);
				$dis=$query->fetchAll();
				foreach ($dis as $key => $value) {
					?>
						<tr>
								<th><?php echo $value['id'] ?></th>
								<th><?php echo $value['name'] ?></th>
								<th><?php echo $value['type_name'] ?></th>
								<th><?php echo $value['amount'] ?></th>
								<th><?php echo $value['price'] ?></th>
								<th><?php echo $value['distributor_name'] ?></th>
						</tr>
						<?php
					}	

				?>
			</thead>
		</table>
		
	</article>
	</div>
	<br>
<div class="jumbotron text-center" style="margin-left: 15%;">
	<p>
		CtyTNHH: Haiconnino <br>
		Địa chỉ: 180 Cao Lô Phường 4 Quận 8 Tp.HCM <br>
		Điện thoại: <a href="#" style=" color: black;">0909123456</a>
	</p>
  </div>
</body>
</html>