<?php require_once('inc/newheader.php');?>
<?php
    if (!isset($_GET['catId']) || $_GET['catId']==NULL) {
    echo "<script>window.location='404.php';</script>";
    }else{
        //$id=$_GET['catId'];
        $id=preg_replace('/[^-a-zA-Z0-9_]/',' ', $_GET['catId']);
    }

?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>
    			Latest From Category
    		</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	   $productbycat=$pd->productByCat($id);
	      	   if ($productbycat) {
	      	   	while ($result=$productbycat->fetch_assoc()) {

	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>

					 <h2><?php echo $result['productName'];?></h2>

					 <p><?php echo $fm->textShorten($result['body'],60);?></p>

					 <p><span class="price">Tk.<?php echo $result['price'];?></span></p>

				      <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}else{
               header("location:404.php");

			} ?>
     </div>

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

