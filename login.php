<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==true) {
header("location:order.php");
}

?>

 <?php
    
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
    $custLogin= $cmr->customerLogin($_POST);
   
}
?>

 <div class="main" style="margin-left: 150px">
    <div class="content">
    	 <div class="login_panel" style="background-color:">
 <span style="color: red;font-size: 18px">
<?php
if (isset($custLogin)) {
  	echo $custLogin;
  }  
?>
</span>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" >
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Password" type="password"/>

                     <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    </div>
            </form>
                 
                    

                    
 <?php
    
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
    $customerReg= $cmr->customerRegistration($_POST);
   
}
?>

<div class="register_account">

<span style="color: red;font-size: 18px">
<?php
if (isset($customerReg)) {
  	echo $customerReg;
  }  
?>
</span>

    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" />
							</div>
							<div>
							<input type="text" name="addres" placeholder="Address" />
						    </div>
							<div>
							   <input type="text" name="city" placeholder="City" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code" />
							</div>
							
							
		    			</td>
		    			<td>
		    			
						    
		    		    
	                           <div>
		                    <input type="text" name="phone" placeholder="Phone" />
		                    </div>
		                    <div>
								<input type="text" name="email" placeholder="Email" />
							</div>
				            <div>
					        <input type="text" name="pass" placeholder="Password" />
				            </div>
		    	</td>
		    </tr> 
		    </tbody>
		    </table>
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
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

