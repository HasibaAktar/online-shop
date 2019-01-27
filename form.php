<!DOCTYPE html>
<?php require_once('inc/top.php');?>
<html lang="en">
    <head>
     <?php require_once('inc/header.php');?>
      <link rel="stylesheet" href="css/form.css" type="text/css">
    </head>
 <body>
 <div style="margin-top:0px;" class="container">  
  <form id="contact"  action="" method="post">
    <h3>Fill The Below Form to Book your Order</h3>
    <h4>All(*) fields are Required</h4>
    <fieldset>
     <lebel for=""><b>Full name:*</b></lebel>
      <input placeholder="Your Full name" type="text" tabindex="1" required>
    </fieldset>
    <fieldset>
     <lebel for=""><b>Full Address:*</b></lebel>
      <input placeholder="Address should be clear" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
     <lebel for=""><b>Phone Number:*</b></lebel>
      <input placeholder="Your Phone Number" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
     <lebel for=""><b>Email:*</b></lebel>
      <input placeholder="Your Email address" type="email" tabindex="3" required>
    </fieldset>
    <fieldset>
     <fieldset>
     <lebel for=""><b>Quantity:*</b></lebel>
      <input placeholder="Select Quantity" type="number" max="100" min="1" tabindex="3" required>
    </fieldset>
      
<!--
    <fieldset>
     <lebel for=""><b>Other Instructions:</b></lebel>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset>
-->
    <fieldset>
         <lebel for=""><b>Your city:*</b></lebel>
         <select name="" id="">
            <option value="">Select Your City</option>
            <option value="Dhaka"> Dhaka</option>
            <option value="Gazipur">Gazipur</option>
            <option value="Dinajpur">Dinajpur</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Rajshahi">Rajshahi</option>
             
         </select>
    </fieldset><br>
    <fieldset>
     
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
   
  </form>
</div>
   
   <?php require_once('inc/footer.php');?>
    </body>
</html>