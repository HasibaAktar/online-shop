<?php require_once('inc/newheader.php');?>



 <div class="main">
    <div class="content">
    	<div class="section group">
		
				<div class="rightsidebar span_3_of_1">
					<h2>BRAND</h2>
					<ul>
				      <?php
				        $getBrand=$brnd->getAllBrand();
				        if ($getBrand) {
				        	while ($result=$getBrand->fetch_assoc()) {
				        		
				      ?>

				      <li><a href="productbybrand.php?brandId=<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></a></li>
				  <?php }}?>
				      
					 </ul>
    	
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

