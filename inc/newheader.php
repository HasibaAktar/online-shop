
<?php
  include 'lib/session.php';
   Session::init();
  include'inc/dbclass.php';
  include'helper/format.php';

  spl_autoload_register(function($class){
  	include_once "classes/".$class.".php";
 });
  $db= new Database();
  $fm= new Format();
  $pd= new Product();
  $cat= new Category();
  $ct= new Cart();
  $cmr=new Customer();
  $brnd=new Brand();

?>





<!DOCTYPE HTML>
<head>
<title>Dreamland</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>


<style>
	.header_top_right{float: left;}
	.search_box{margin-top: 0px;}
</style>

</head>
<body>
  <div class="wrap" style="width: 100%;background-color:#3A393E;">
  <div class="header_top">
  <div class="logo">
	<a href="index.php"><img src="images/log.jpg" alt="" /></a>
  </div>

  <div class="header_top_right" style="">

  <div class="search_box">
	<form action="search_page.php" method="post">
		<input type="text" name="p_search" placeholder ="Search for Products">
		<input type="submit" name="submit" value="search">
	</form>
  </div>

  <div class="shopping_cart" style="margin-left: 510px;">
		<div class="cart" style="">
			<a href="cart.php" title="View my shopping cart" rel="nofollow">
				<span class="cart_title">Cart</span>
				<span class="no_product">
				<?php 
					$getData=$ct->checkCartTable();
					if ($getData) {
						$gtotal=Session::get("gtotal");
                         echo "Tk.".$gtotal;
					}else{
						echo "(Empty)";
					}
                                  
					?>
                 </span>
				</a>
			</div>
			      </div>
			      <?php
			      if (isset($_GET['cid'])) {
			      	$cmrId=Session::get("cmrId");
			      	$deldata=$ct->delCustomerCart();
			      	$delComp=$pd->delComparedData($cmrId);
			      	Session::destroy();
			      }
                ?>
		   <div class="login">
<?php
$login=Session::get("cuslogin");
if ($login==false) {?>
	<a href="login.php">Login</a>
  <?php } else{ ?>
          <a href="?cid=<?php Session::get('cmrId')?>">Logout</a>
  <?php } ?>

 </div>
 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  
	  <li><a href="category.php">Category</a></li>
      <li><a href="brand.php">Brand</a></li>
       <?php 
        $chkCart = $ct->checkCartTable();
        if ($chkCart) { ?>
        	<li><a href="cart.php">Cart</a></li>
        	<li><a href="payment.php">Payment</a></li>
        <?php } ?>

        <?php 
        $cmrId=Session::get("cmrId");
        $chkOrder = $ct->checkOrderTable($cmrId);
        if ($chkOrder) { ?>
        	
        	<li><a href="orderdetails.php">Order</a></li>
        <?php } ?>
        <?php 
         $cmrId=Session::get("cmrId");
	        $getPd=$pd->getComparedData($cmrId);
			    if ($getPd) {
        ?>
      <li><a href="compare.php">Compare</a></li>
  <?php }?>

  <?php 
   $checkWlist=$pd->checkWlistData($cmrId);
			    if ($checkWlist) {
        ?>
      <li><a href="wlist.php">Wishlist</a></li>
  <?php }?>

      <?php
	  $login=Session::get("cuslogin");
	  if ($login==true) { ?>
	  	  <li><a href="profile.php">Profile</a> </li>
	 <?php  } ?>
	  <li><a href="contact.php">Contact Us</a> </li>
<div class="clear"></div>
	</ul>
</div>
 </div>