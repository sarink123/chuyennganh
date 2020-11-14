<?php include('lib\server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="styleindex.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						asd
					</li>
					<li class="nav-item" id="khoangcach">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<p id="navright">
						<li class="input-group mb-3" >
							<span class="input-group-prepend">
								<input type="text" placeholder="">
								<div>
								<span class="input-group-text">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
										<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
									</svg>
								</span>
							</div>
							</span>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="khoangcach" >
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
								<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
							</svg>
						</a>
					</li>
					<li class="nav-item" id="khoangcach">
						<div class="dropdown">
							<button id="menuright" type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
							<?php 
								 if($_SESSION['logged']==true){
								 	echo $_SESSION['username'];
								 }
								?>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Thông tin cá nhân </a>
								<a class="dropdown-item" href="#">Trợ giúp & hỗ trợ</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="matkhau.php">Thay đổi mật khẩu</a>
							</div>
						</div>
					</li>
					<li class="nav-item" id="khoangcach">
						<a class="nav-link" href="#" id="menuright">logout</a>
					</li>
					</p>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="width: 15%;">
		<ul id="menuleftul">
			<li><h5 class="dropdown-header">Kho quản lý</h5></li>
			<li><a href="sanpham.php" class="dropdown-item" >Tồn kho</a></li>
			<li><a href="nhaphanphoi.php" class="dropdown-item" >Nhà phân phối</a></li><li><a href="#" class="dropdown-item" >Nhập kho</a></li>
			<li><a href="#" class="dropdown-item" >Xuất kho</a></li>
			<li><a href="chinhanh.php" class="dropdown-item" >Cửa hàng </a></li>
			<li><h5 class="dropdown-header">Giúp đỡ</h5></li>

			<li><a href="#" class="dropdown-item" >Liên hệ</a></li>
		</ul>
	</nav>
	<div style="margin-left: 25%">
	<article id="box">
		<table class="w3-table-all w3-hoverable">
			<thead>
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Số Lượng</th>
					<th>Đơn giá</th>
					<th>Mã nhà phân phối</th>
				</tr>
				<?php 
				$sql="SELECT * FROM goods";
				$query = $conn->query($sql);
				$dis=$query->fetchAll();
				foreach ($dis as $key => $value) {
					?>
						<tr>
								<th><?php echo $value['id'] ?></th>
								<th><?php echo $value['name'] ?></th>
								<th><?php echo $value['amount'] ?></th>
								<th><?php echo $value['price'] ?></th>
								<th><?php echo $value['distributor_id'] ?></th>
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