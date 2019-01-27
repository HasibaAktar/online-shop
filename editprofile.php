<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>
 <?php
    $cmrId=Session::get("cmrId");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $updateCmr= $cmr->customerUpdate($_POST,$cmrId);
   
}
?>

<style>
.tblone{width: 600px;margin:0 auto; border:5px solid #ddd;}
.tblone tr td{text-align: justify;}
.tblone input[type="text"]{width:400px;padding: 3px;font-size: 15px;}

	

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		$id=Session::get("cmrId");
    		$getdata=$cmr->getCustomerData($id);
    		if ($getdata) {
    			while ($result=$getdata->fetch_assoc()) {
    				# code...
    		?>
            <form action="" method="post">
    		<table class="tblone" >
                <?php 
                if (isset($updateCmr)) {
                    echo "<tr><td colspan='2'> ".$updateCmr."</td></tr>";
                }

                ?>

                
    			<tr>
    				<td colspan="2"><h2>Update Profile Details </h2></td>
    				
    			</tr>
    			<tr>
    				<td width="20%">Name</td>
    				
    				 <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				
    				 <td><input type="text" name="addres" value="<?php echo $result['addres'];?>"></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				
    				 <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				
    				 <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				
    				 <td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
    			</tr>
    			<tr>
    				<td>Zip-Code</td>
                    <td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
    			</tr>

    			<tr>
    				<td></td>

    				<td><input type="submit" name="submit" value="Save"></td>
    			</tr>
    			
    			
    		</table>
        </form>

    	<?php }} ?>


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

