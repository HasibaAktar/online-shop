<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>

<style>
.psuccess{width: 500px;min-height: 200px;text-align: center;border: 2px solid #ddd;margin:0 auto;padding:20px;}
.psuccess h2{border-bottom: 2px solid #ddd;margin-bottom: 35px;padding-bottom: 10px; display: block;background-color: #58367C;color:black;}
.psuccess p{ line-height: 25px; font-size: 15px;padding:5px,40px;}
.back a{width: 160px;margin:5px auto 0;padding: 7px 0;text-align: center;display: block;background-color: #555;border:1px solid #333;color: #fff;border-radius: 3px;font-size: 15px;}



</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="psuccess">
                <h2>Success</h2>
                <?php
                 $cmrId=Session::get("cmrId");
                 $amount=$ct->payableAmount($cmrId);
                 if ($amount) {
                 	$sum = 0;
                 	while ($result=$amount->fetch_assoc()) {
                 		$price=$result['price'];
                 		$sum=$sum+$price;
                        
                 	}
                 }

                ?>


                <p style="color: red">Total Amount(Inc.Vat):Tk.
                	<?php
                        $vat= $sum * 0.05;
                        $total=$sum+$vat;
                        echo  $total;


                	?>

                </p>
                <p><p>
                    
                </p>Thanks for Purchase.Receive your order successfully.We will contact you ASAP with delivery details.To confirm your order..<a href="orderdetails.php">Click here..</a></p>
                
            </div>
            



 		</div>
 	</div>

    <!-- <div class="back">
    <a href="cart.php">Back</a>
    </div> -->
	</div>

    <script type="text/javascript">
		$(document).ready(function() {
			
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

