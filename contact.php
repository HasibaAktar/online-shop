<?php require_once('inc/newheader.php');?>
<?php
   
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $customerCon= $cmr->ContactInsert($_POST);
   
}
?>
 <div class="main">
    <div class="content" style="margin-left: 130px">
    	<div class="support">
  			<div class="support_desc" >

  
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Dreamland Online Shop</span></p>
  				<?php
if (isset($customerCon)) {
  	echo $customerCon;
  }  
?>

  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group" >
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form action="" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text"name="name" value=""/></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text"name="email" value=""/></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text"name="mobile" value=""/></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea  name="subject"> </textarea></span>
						    </div>
						   <div>
						   		<div class="bttn" style="float: right;"><button name="submit">Submit</button></div>
						  </div>
					    </form>
					    
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<strong>Address</strong><br/><br/><br/>
				   		<p>Phone:</p>
				   		<p>Fax: </p>
				 	 	<p>Email:</p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
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

