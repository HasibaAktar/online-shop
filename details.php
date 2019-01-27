<?php require_once('inc/newheader.php');?>

<?php

if (isset($_GET['proid'])) {
   $id=$_GET['proid'];
    }
    
    if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['submit'])) {
    	$quantity=$_POST['quantity'];
        $addCart= $ct->addToCart($quantity,$id);
   
}
?>
<?php
    $cmrId=Session::get("cmrId");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['compare'])) {
    	$productId=$_POST['productId'];
        $insertCom= $pd->insertCompareData($productId,$cmrId);
   
}
?>
<?php
    $cmrId=Session::get("cmrId");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wlist'])) {
    	
        $savewlist= $pd->saveWishlistData($id,$cmrId);
   
}
?>


<style>
.mybtn{width: 100px;float: left;margin-right: 30px;}	
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<div class="cont-desc span_1_of_2">	

	
         <?php
            $getPd=$pd->getSingleProduct($id);

            if ($getPd) {
            	while ($result=$getPd->fetch_assoc()) {
            	
         ?>

					<div class="grid images_3_of_2">
						<img id="zoom" src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
										
					<div class="price">
						<p>Price: <span>Tk.<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand: <span><?php echo $result['brandName']; ?></span></p>
						
					</div>

				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>

				<span style="color: red;font-size: 18px">
					<?php
					if ( isset($addCart)) {
						echo $addCart;
					}

					?>

				</span>
				<?php
					if ( isset($insertCom)) {
						echo $insertCom;
					}
                     if ( isset($savewlist)) {
						echo $savewlist;
					}
					?>
				
         <?php
        $login=Session::get("cuslogin");
	      if ($login==true) {
         ?>
			<div class="add-cart">
				<div class="mybtn">
				<form action="" method="post">
			<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>	
			<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
				</form>	
			</div>
            <div class="mybtn">
				<form action="" method="post">	
			<input type="submit" class="buysubmit" name="wlist" value="Add to Wishlist"/>
				</form>	
			</div>

			</div>
		<?php }?>

		</div>
			
			<div class="product-desc" style="margin-right: 100px">
			<h2>Product Details</h2>
			<?php echo $result['body']; ?>
	    </div>
			<?php }}?>

			

	</div>
				


				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <?php
				        $getCat=$cat->getAllCat();
				        if ($getCat) {
				        	while ($result=$getCat->fetch_assoc()) {
				        		
				      ?>

				      <li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
				  <?php }}?>
				      
					 </ul>
    	
 				</div>
 		</div>
 	</div>





	



	</div>
<script src="js/jquery.js"></script>
	<script src="js/jquery.elevateZoom.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>

<script>
	$('#zoom').elevateZoom({zoomType: "lens",lensShape : "round",lensSize:150,scrollZoom:true});


</script>
</body>
</html>

