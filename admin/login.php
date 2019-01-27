<?php require_once('classes/adminlogin.php');?>
<?php require_once('classes/Admin.php');?>
<?php
$al= new adminlogin();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$name=$_POST['name'];
	$password= md5($_POST['password']);

	$loginChk= $al->adminLogin($name,$password);
	# code...
}

?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size: 18px;">
				<?php
                  if (isset($loginChk)) {
                  	echo $loginChk;
                  }
				?>

			</span>
			<div>
				<input type="text" placeholder="Username"  name="name"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Dreamland Online Shop</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>