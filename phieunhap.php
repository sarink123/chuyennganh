<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="css/styleindex.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		<div id="container">
			<div id="menu">
				<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav">
							<li class="nav-item">
								asd
							</li>
							<!-- <li class="nav-item" id="khoangcach">
									<button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
							</li> -->
							<li class="nav-item" id="khoangcach">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<p id="navright">
								<li class="input-group mb-3" >
									<span class="input-group-prepend">
										<input type="text" placeholder="Username">
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
								<li class="nav-item" id="khoangcach">
									<div class="dropdown">
										<button id="menuright" type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
										Admin
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="infocanhan.php">Thông tin cá nhân </a>
											<a class="dropdown-item" href="#">Trợ giúp & hỗ trợ</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="login.php">Đăng xuất</a>
										</div>
									</div>
								</li>
								<li class="nav-item" id="khoangcach">
									<a class="nav-link" href="logout.php" id="menuright" name="logout">logout</a>
								</li>
							</p>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div id="menuleft">
			<!-- <nav class="w3-sidebar w3-bar-block w3-card w3-animate-left"> -->
			<ul >
				<li><a href="#" class="dropdown-item" >Tìm kiếm</a></li>
				<li><h5 class="dropdown-header">Kho quản lý</h5></li>
				<li><a href="sanpham.php" class="dropdown-item" >Tồn kho</a></li>
				<li><a href="nhaphanphoi.php" class="dropdown-item" >Nhà phân phối</a></li><li><a href="phieunhap.php" class="dropdown-item" >Nhập kho</a></li>
				<li><a href="phieuxuat.php" class="dropdown-item" >Xuất kho</a></li>
				<li><a href="chinhanh.php" class="dropdown-item" >Cửa hàng </a></li>
				<li><h5 class="dropdown-header">Giúp đỡ</h5></li>
				<li><a href="#" class="dropdown-item" >Liên hệ</a></li>
			</ul>
		</nav>
	</div>
	<div id="content">
		<article id="box">
		<form action="">
		<table class="w3-table-all w3-hoverable">
			<tr>
                  				<td colspan="2">
                  					<h4 align="center">PHIẾU NHẬP KHO</h4>
                  				</td>
                  			</tr>
                  			<tr >
                  				<td>Mã phiếu nhập: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Tên nhân viên: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Mã nhân viên: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Mã hàng: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Tên hàng: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Số lượng: </td>
                  				<td><input type="text" size="30" placeholder="0"></td>
                  			</tr>
                  			<tr >
                  				<td>Đơn giá: </td>
                  				<td><input type="text" size="30" placeholder="0vnđ"></td>
                  			</tr>
                  			<tr>
                  				<td>Loại: </td>
                  				<td>
                  					<select name="loai">
                  						<option></option>
                  						<option value="">Kaki</option>
                  						<option value="">Jean</option>
                  						<option value="">Thun</option>
                  						<option value="">Len</option>
                  					</select>
                  				</td>
                  			</tr>
                  			<tr >
                  				<td>Tên nhà cung cấp: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Địa chỉ nhà cung cấp: </td>
                  				<td><input type="text" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td>Điện thoại nhà cung cấp: </td>
                  				<td><input type="tel" size="30"></td>
                  			</tr>
                  			<tr >
                  				<td colspan="2" style="text-align: center" >
                  					<input type="submit" value="Xuất phiếu">&nbsp;&nbsp;
                  					<input type="reset" value="Xóa">
                  				</td>
                  			</tr>
		</table>
	</form>
	</article>

	</div>
	<div id="footer">
		<p>
			CtyTNHH: Haiconnino <br>
			Địa chỉ: 180 Cao Lô Phường 4 Quận 8 Tp.HCM <br>
			Điện thoại: <a href="#" style=" color: black;">0909123456</a>
		</p>
	</div>
</div>
</body>
</html>