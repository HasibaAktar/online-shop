<?php require_once('inc/newheader.php');?>

<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>
<?php
if (isset($_GET['customerId'])) {
	$id=$_GET['customerId'];
	$time=$_GET['time'];
	$price=$_GET['price'];
    $confirm=$ct->productShiftConfirm($id,$time,$price);
}

?>

<style>
.tblone{width: 80%;text-align: justify;}
.tblone tr td{}

	

</style>

 <div class="main" style="margin-left: 145px">
    <div class="content">
    		 <div class="section group">
    		 	<div class="order">
    		 		<h2>Your Ordered Details</h2>
    		 		<p style="color: green">After receive your order please confirm the 'Action'</p>

    		 		<table class="tblone">
							<tr>
								<td style="background-color: #8e56c9;">No.</td>
								<td style="background-color: #8e56c9;">Product Name</td>
								<td style="background-color: #8e56c9;">Image</td>
								
								<td style="background-color: #8e56c9;">Quantity</td>
								<td style="background-color: #8e56c9;">Price</td>
								<td style="background-color: #8e56c9;">Date</td>
								<td style="background-color: #8e56c9;">Status</td>
								<td style="background-color: #8e56c9;">Action</td>
							</tr>
							<?php
							$cmrId=Session::get("cmrId");
							$getOrder=$ct->getOrderedProduct($cmrId);
							if ($getOrder) {
								$i=0;
							    while ($result=$getOrder->fetch_assoc()) {
							    $i++;
								?>
							
							
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td> <?php echo $result['quantity'];?></td>

								<td>Tk. <?php 
								$total=$result['price'];
								echo $total;

								?>
									
								</td>
								<td><?php echo $fm->formatDate($result['date']);?></td>

								<td><?php 
								if ($result['status']=='0') {
									echo "Pending";
								}elseif ($result['status']=='1') {
								
                                       echo "Shifted";
                              		
                              	
								 }else{
									echo "Ok";
								}

								?>
									
								</td>
								<?php
								if ($result['status']=='1') {?>
									<td><a href="?customerId=<?php echo $cmrId; ?> & price=<?php echo $total; ?> & time=<?php echo $result['date']; ?>">Confirm</a> </td>
								<?php } elseif ($result['status']=='2') {?>
								<td>Ok</td>

								<?php }elseif ($result['status']=='0') { ?>
									<td>N/A</td>

								<?php }?>
							</tr>
                      <?php } }?>

						
							
						</table>


    		 	</div>
    		 </div>
       <div class="clear"></div>
    </div>
 </div>

  
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

