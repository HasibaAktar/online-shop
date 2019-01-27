<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>

<style>
.tblone{width: 600px;margin:0 auto; border:5px solid #ddd;}
.tblone tr td{text-align: justify;}
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
    		<table class="tblone" >
    			<tr>
    				<td colspan="3"><h2>Your Profile Details</h2></td>
    				
    			</tr>
    			<tr>
    				<td width="20%">Name</td>
    				<td width="5%">:</td>
    				<td><?php echo $result['name'];?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['addres'];?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['phone'];?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email'];?></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				<td>:</td>
    				<td><?php echo $result['city'];?></td>
    			</tr>
    			<tr>
    				<td>Zip-Code</td>
    				<td>:</td>
    				<td><?php echo $result['zip'];?></td>
    			</tr>

    			<tr>
    				<td></td>
    				<td></td>
    				<td><a href="editprofile.php">Update Profile</a></td>
    			</tr>
    			
    			
    		</table>

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

