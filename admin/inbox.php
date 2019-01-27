<?php require_once('inc/top.php');?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Cart.php');
$ct=new Cart(); 
$fm=new Format();

?>

<?php
if (isset($_GET['shiftid'])) {
	$id=$_GET['shiftid'];
	$time=$_GET['time'];
	$price=$_GET['price'];
    $shift=$ct->productShifted($id,$time,$price);
}

if (isset($_GET['delproid'])) {
	$id=$_GET['delproid'];
	$time=$_GET['time'];
	$price=$_GET['price'];
    $delOrder=$ct->delProductShifted($id,$time,$price);
}

?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 75%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
 
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                  <?php
                  if (isset($shift)) {
                  	echo $shift;
                  }
                  if (isset($delOrder)) {
                  	echo $delOrder;
                  }

                  ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="background-color: #8ba09a; color: white;">ID</th>
							<th style="background-color: #8ba09a; color: white;">Date</th>
							<th style="background-color: #8ba09a; color: white;">Product Name</th>
							<th style="background-color: #8ba09a; color: white;">Product Id</th>
							<th style="background-color: #8ba09a; color: white;">Quantity</th>
							
							<th style="background-color: #8ba09a; color: white;">T.Price</th>
							<th style="background-color: #8ba09a; color: white;">Cust.ID</th>
							<th style="background-color: #8ba09a; color: white;">Address</th>
							<th style="background-color: #8ba09a; color: white;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct=new Cart(); 
						$fm=new Format();
						$getOrder=$ct->getAllOrderProduct();
						if ($getOrder) {
							while ($result=$getOrder->fetch_assoc()) {
								
							?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['date'];  ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['productId']; ?></td>

							<td><?php echo $result['quantity']; ?></td>
							
							<td>Tk.<?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>
                              <?php
                              if ($result['status'] =='0') {?>
                              	<td>

                              		<a href="?shiftid=<?php echo $result['cmrId']; ?> & price=<?php echo $result['price']; ?> & time=<?php echo $result['date']; ?>">Shift</a> 

                              	</td>

                             <?php }elseif($result['status'] =='1'){ ?>

                                <td> Pending.. </td>
						        <?php }else{ ?>
                                            <td> <a href="?delproid=<?php echo $result['cmrId']; ?> & price=<?php echo $result['price']; ?> & time=<?php echo $result['date']; ?>">Remove </a>  
                                            </td>
                                  <?php } ?>
						</tr>
					<?php }} ?>
						
					
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
 