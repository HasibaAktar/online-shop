<?php require_once('inc/newheader.php');?>
<?php
$login=Session::get("cuslogin");
if ($login==false) {
header("location:login.php");
}

?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
    $cmrId=Session::get("cmrId");
    $insertOrder=$ct->orderProduct($cmrId);
    $deldata=$ct->delCustomerCart();
    header("location:success.php");

}

?>

<style>
.division{width: 50%;float: left;}
.tblone{width: 500px;margin:0 auto; border:5px solid #ddd;margin-right: 88px;}
.tblone tr td{text-align: justify;}

.tbltwo{float:right;text-align:left;width: 50%;border:2px solid #ddd;margin-right: 88px;margin-top: 12px;}
.tbltwo tr td{text-align: justify;padding: 5px 10px;}
.ordernow{padding-bottom: 40px;}
.ordernow a{width: 200px;margin:20px auto 0;text-align: center;padding: 5px;font-size: 25px;display: block;background-color: #ff0000;color:#fff;border-radius: 3px;}

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="division">
                <table class="tblone">
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                               
                                <th>Price</th>
                                <th>Quantity</th>
                                <th> Price</th>
                               
                            </tr>
                            <?php
                            $getPro=$ct->getCartProduct();
                            if ($getPro) {
                                $i=0;
                                $sum=0;

                                while ($result=$getPro->fetch_assoc()) {
                                    $i++;
                                ?>
                            
                            
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName'];?></td>
                                
                                <td>Tk. <?php echo $result['price'];?></td>
                                <td><?php echo $result['quantity'];?></td>

                                <td>Tk. <?php 
                                $total=$result['price']*$result['quantity'];
                                echo $total;

                                ?></td>
                                
                            </tr>
                        <?php  
                        $sum=$sum+$total;
                        
                        ?>

                        <?php }}?>
                            
                        </table>
                       
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>TK.<?php echo $sum;?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>5%(<?php echo $vat=$sum*.05;?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>Tk.
                                <?php
                                   $vat=$sum*.05;
                                   $gtotal=$sum+$vat;
                                   echo  $gtotal;
                                   Session::set("gtotal",$gtotal);
                                ?> 
                                </td>
                            </tr>
                       </table>
            </div>
            <div class="division">

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
    <div class="ordernow"><a href="?orderid=order">Order Now</a></div>
	</div>

    <script type="text/javascript">
		$(document).ready(function() {
			
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

