<?php require_once('inc/newheader.php');?>
<?php
if (isset($_GET['delwlistid'])) {
	$productId=$_GET['delwlistid'];
	$delwlist=$pd->delWlistData($cmrId,$productId);
}
?>

<style>
	table.tblone img{
		height: 60px;
		width: 80px;
	}

</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Wishlist</h2>
			    	
			    
						<table class="tblone">
							<tr>
								<th style="width: 2px;"> SL</th>
								<th>Product Name</th>
								<!-- <th>Description</th> -->
								<th>Image</th>
								<th>Price</th>
								
								<th>Action</th>
							</tr>
							<?php
							$cmrId=Session::get("cmrId");
							$getPd=$pd->checkWlistData($cmrId);
							if ($getPd) {
								$i=0;

								while ($result=$getPd->fetch_assoc()) {
									$i++;
								?>
							
							
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>Tk. <?php echo $result['price'];?></td>
					            <td>
					            	<a href="details.php?proid=<?php echo $result['productId'];?>">Buy Now</a> ||
					            	<a href="?delwlistid=<?php echo $result['productId'];?>">Remove</a>
					            </td>
								
							</tr>
                       
						<?php }}?>
							
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%;text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
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

