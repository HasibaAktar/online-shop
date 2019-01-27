<?php require_once('inc/newheader.php');?>
<?php
if (isset($_GET['delpro'])) {
	$delId=preg_replace('/[^-a-zA-Z0-9_]/',' ', $_GET['delpro']);
	$delProduct=$ct->delProductByCart($delId);
}
?>
<?php
   if ($_SERVER['REQUEST_METHOD']=='POST') {
   		// print_r($GLOBALS);
    	$cartId=$_POST['cartId'];
    	$quantity=$_POST['quantity'];
        $updateCart= $ct->updateCartQuantity($cartId,$quantity);
        if ($quantity<=0) {
        	$delProduct=$ct->delProductByCart($cartId);
        }
    }
?>
<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<span style="color: green;font-size: 18px">
			    	<?php
			    	if ( isset($updateCart)) {
			    		echo  $updateCart;
			    	}
			    	if ( isset($delProduct)) {
			    		echo  $delProduct;
			    	}

			    	?>
			    	</span>
						<table class="tblone">
							<tr>
								<th width="5%"> SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							$getPro=$ct->getCartProduct();
							if ($getPro) {
								$i=0;
								$sum=0;

								while ($result=$getPro->fetch_assoc()) {
									$i++;
								?>
							
							
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>Tk. <?php echo $result['price'];?></td>
					<td>
						<form action="" method="post">
							<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
							<!-- <input type="hidden" name="quantityy" value="<?php echo $result['quantity'];?>"/> -->

							<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
							<input type="submit" name="submit" value="Update"/>
						</form>
					</td>
								<td>Tk. <?php 
								$total=$result['price']*$result['quantity'];
								echo $total;

								?></td>
								<td><a onclick="return confirm('Are You Sure To Delete!')"; href="?delpro=<?php echo $result['cartId'];?>">X</a></td>
							</tr>
                        <?php  
                        $sum=$sum+$total;
                        
                        ?>

						<?php }}?>
							
						</table>
						<?php
						$getData=$ct->checkCartTable();
						if ($getData) {
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK.<?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>5%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
							    <?php
                                   $vat=$sum*.05;
                                   $gtotal=$sum+$vat;
                                   echo  $gtotal;
                                   Session::set("gtotal",$gtotal);
								?> 
							    </td>
							</tr>
					   </table>
					<?php }else{
						echo "Cart Empty!Please Shop Now.";
					}?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
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

