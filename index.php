<?php require_once('inc/newheader.php');?>
 <div class="main">
 <div class="content">
 <div class="content_top">
    		<?php require_once('inc/slider.php');?>
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      	<?php
             $getFpd=$pd->getFeaturedProduct();
             if ($getFpd) {
             	while ($result=$getFpd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4" style="margin:1px;margin-left: 45px; background-color: #adbed2">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
                      <h2><?php echo $result['productName'];?></h2>

					 <p><span class="price">Tk.<?php echo $result['price'];?></span></p>


				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				     
				</div>
			<?php }}?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	    </div>
			<div class="section group" style="background-color:">
            <?php
             $getNpd=$pd->getNewProduct();
             if ($getNpd) {
             	while ($result=$getNpd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4" style="margin:5px; width:290px; background-color:#adbed2 ">
					 <a href="details.php?proid=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 
					<h2><?php echo $result['productName'];?></h2>
					<p><span class="price">Tk.<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			<?php }}?>
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
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>

	  
</body>
</html>
