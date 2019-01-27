<?php require_once('inc/newheader.php');?>
<style>
	.notfound{}
    .notfound h2{font-size: 100px;line-height: 130px;text-align: center;}
    .notfound h2 span{font-size: 120px;display: block;color: red;}
</style>
 <div class="main">
    <div class="content">
    		 <div class="section group">
    		 	<div class="notfound">
    		 		<h2><span>404</span>Not Found</h2>
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

