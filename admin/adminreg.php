<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?PHP require_once('classes/Admin.php');?>



<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:;
}

/* Add padding to containers */
.container {
  padding:15px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 40%;
  padding:8px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  margin-left: 2px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;

}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 20px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color:  #29A1E6;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
.register_account{
	margin-right: 35px;
}
</style>      	
  <?php
    $ad= new Admin();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
    $adminReg= $ad->adminRegistration($_POST);
   
}
?>                  

 <div class="register_account">

<span style="color: red;font-size: 18px">
<?php
if (isset($adminReg)) {
  	echo $adminReg;
  }  
?>
</span>

    		
 <form action="adminreg.php" method="post">
		   			
	<div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
      <label for="email"><b>Name:</b></label><br>
    <input type="text" placeholder="Enter Your Name" name="name" required><br>

    <label for="email"><b>Email:</b></label><br>
    <input type="text" placeholder="Enter Your Email" name="email" required><br>

    <label for="email"><b>Mobile:</b></label><br>
    <input type="text" placeholder="Enter Your Mobile No" name="mobile" required><br>

    <label for="psw"><b>Password:</b></label><br>
    <input type="password" placeholder="Enter Your Password" name="password" required><br>

    
    <hr>
   

    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>
  
  

</form>
				
  </div>


       <div class="clear"></div>
   
 

   
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

