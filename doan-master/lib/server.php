<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// initializing variables
$username = "";
$email    = "";
$Name="";
$password_1="";
$password_2="";
$date=date('y-m-d H:i:s');

require_once("connection.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
// receive all input values from the form
$username = $_POST['username'];
$email = $_POST['email'];
$name= $_POST['name'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$admin=$_POST['op'];
if (!$username || !$password_1 || !$password_2 || !$email || !$name){
echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!"); window.location="register.php";</script>';
exit;
}
if ($password_1 != $password_2) {
echo '<script language="javascript">alert("Mật khẩu không trùng khớp"); window.location="register.php";</script>';
exit;
}
//Kiểm tra password
$password_check='/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/';
if(!preg_match($password_check, $password_1)){
echo '<script language="javascript">alert("password không hợp lệ!"); window.location="register.php";</script>';
exit;
}
$password = md5($password_1);
//Kiểm tra email
$email_check='#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
if(!preg_match($email_check, $email)){
echo '<script language="javascript">alert("Email không hợp lệ!"); window.location="register.php";</script>';
exit;
}
//Kiểm tra username
$username_check='/^[a-z0-9_\.]{6,32}$/';
if(!preg_match($username_check, $username)){
echo '<script language="javascript">alert("username không hợp lệ!"); window.location="register.php";</script>';
exit;
}

$user_check_query =$conn->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
$user_check_query->setFetchMode(PDO::FETCH_ASSOC);
$user_check_query->execute(array('username'=>$username,'email'=>$email));

while ($user=$user_check_query->fetch()) {
if ($user['username'] === $username) {

echo '<script language="javascript">alert("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác"); window.location="register.php";</script>';
exit;
}
if ($user['email'] === $email) {
// array_push($errors, "email already exists");
echo '<script language="javascript">alert("Email này đã có người dùng. Vui lòng chọn Email khác."); window.location="register.php";</script>';
exit;
}
}
$query =$conn->prepare ("INSERT INTO users (username, email, password,fullname,createdate,admin) VALUES(?,?,?,?,?,?)");

$query->bindParam(1, $username);
$query->bindParam(2, $email);
$query->bindParam(3, $password);
$query->bindParam(4, $name);
$query->bindParam(5, $date);
$query->bindParam(6, $admin);
if($query->execute()){
echo '<script language="javascript">alert("Đăng ký thành công! Vui lòng đăng nhập."); window.location="index.php";</script>';
}
}
//LOGIN
if (isset($_POST['log_user'])){
$usernamelg = $_POST['usernamelg'];
$passwordlg_m = $_POST['passwordlg'];
if(!$usernamelg || !$passwordlg_m){
echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!!"); window.location="index.php";</script>';
exit;
}
else{
$passwordlg = md5($passwordlg_m);
$sql = "SELECT * FROM users WHERE (username=:username OR email=:email) AND password=:password";
$query = $conn->prepare($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute(array('username'=>$usernamelg,'email'=>$usernamelg,'password'=>$passwordlg));
while ($user=$query->fetch()) {

if ($user['username'] === $usernamelg || $user['email']===$usernamelg ){
if($user['password']===$passwordlg) {
	$name=$user['fullname'];
  $_SESSION['username'] = $name;
  $_SESSION['admin']=$user['admin'];
	if($user['admin']==0){
  $_SESSION['logged'] = true;
echo '<script language="javascript">alert("Đăng nhập nhân viên thành công! "); window.location="trangnv.php";</script>';
}
else{
  $_SESSION['logged'] = true;
echo '<script language="javascript">alert("Đăng nhập quản lý thành công! "); window.location="trangadmin.php";</script>';
}
}
}
if(($user['username'] != $usernamelg || $user['email']!=$usernamelg)||$user['password']!=$passwordlg) {
echo '<script language="javascript">alert("Username or password is not correct!! vui lòng nhập lại"); window.location="index.php";</script>';
exit;
}

}

}
}
//RESET PASSWORD
// if (isset($_POST['log_reset'])){
// $email=$_POST['email'];
// if(!$email){
// echo '<script language="javascript">alert("Vui lòng nhập email!!"); window.location="matkhau.php";</script>';
// exit;
// }
// $email_check='#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
// if(!preg_match($email_check, $email)){
// echo '<script language="javascript">alert("Email không hợp lệ!"); window.location="matkhau.php";</script>';
// exit;
// }
// $sql = "SELECT * FROM users WHERE email=:email";
// $query = $conn->prepare($sql);
// $query->setFetchMode(PDO::FETCH_ASSOC);
// $query->execute(array('email'=>$email));
// while ($user=$query->fetch()) {
// if ($user['email']===$email){
// //GỬI MAIL MẬT KHẨU
// require("C:/wamp64/www/doan-master/doan-master/PHPMailer-master/src/PHPMailer.php");
// require("C:/wamp64/www/doan-master/doan-master/PHPMailer-master/src/SMTP.php");
// require("C:/wamp64/www/doan-master/doan-master/PHPMailer-master/src/Exception.php");
// $mail = new PHPMailer;
// //Enable SMTP debugging.
// $mail->SMTPDebug = 3;                           
// //Set PHPMailer to use SMTP.
// $mail->isSMTP();        
// //Set SMTP host name                      
// $mail->Host = "smtp.gmail.com";
// //Set this to true if SMTP host requires authentication to send email
// $mail->SMTPAuth = true;                      
// //Provide username and password
// $mail->Username = "lings2709@gmail.com";             
// $mail->Password = "Giale123456789";                       
// //If SMTP requires TLS encryption then set it
// $mail->SMTPSecure = "tls";                       
// //Set TCP port to connect to
// $mail->Port = 587;                    
// $mail->From = "lings2709@gmail.com";
// $mail->FromName = "Full Name";
// $mail->addAddress($email, $user['fullname']);
// $mail->isHTML(true);
// $mail->Subject = "Subject Text";
// $mail->Body = "<i>Mail body in HTML</i>";
// $mail->AltBody = "This is the plain text version of the email content";
// if(!$mail->send())
// {
// echo "Mailer Error: " . $mail->ErrorInfo;
// }
// else
// {
//  echo '<script language="javascript">alert("Vui lòng kiểm tra email! ");</script>';
// }

// }
// }

// if($user['email']!=$email) {
// echo '<script language="javascript">alert("Emai này chưa đăng ký! "); window.location="matkhau.php";</script>';

// }



// }
