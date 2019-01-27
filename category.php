<?php require_once('inc/newheader.php');?>


 <div class="main">
    <div class="content">
    	<div class="section group">
		
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

    <script type="text/javascript">
		$(document).ready(function() {
			
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

