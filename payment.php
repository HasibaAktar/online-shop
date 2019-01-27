<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>

<style>
.payment{width: 500px;min-height: 200px;text-align: center;border: 2px solid #ddd;margin:0 auto;padding:50px;}
.payment h2{border-bottom: 2px solid #ddd;margin-bottom: 35px;padding-bottom: 10px; display: block;background-color: #58367C;color:black;}
.payment a{background-color: red;border-radius: 3px;color: #fff;font-size: 20px;padding:5px,40px;}

.back a{width: 160px;margin:5px auto 0;padding: 7px 0;text-align: center;display: block;background-color: #555;border:1px solid #333;color: #fff;border-radius: 3px;font-size: 15px;}	

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="payment">
                <h2> Choose Payment Option</h2>
                <a href="offline.php">CashOn Delevery</a>
                <a href="404.php">Online Payment</a>
            </div>
            <div class="back">
                <a href="cart.php">Back</a>
            </div>



 		</div>
 	</div>
	</div>

    <script type="text/javascript">
		$(document).ready(function() {
			
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

