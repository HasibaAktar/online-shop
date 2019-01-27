<?php require_once('inc/top.php');?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Brand.php');?>
<?php
    $brnd=new Brand();

   if (isset($_GET['delbrand'])) {
   	$id=$_GET['delbrand'];
   	$delBrand=$brnd->delBrandById($id);
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

                <h2>Brand List</h2>
                <?php
                   if (isset($delBrand)) {
                    echo $delBrand;
                    
                   }
                 
                ?>
                
               <!--  <div class="block">   -->      
                    <table border="1 px solid" style="float: right;">
					
						<tr style="background-color: #653091;">
							<th style="color:white">Serial No....</th>
							<th style="color:white">Brand Name....</th>
							<th style="color:white">Action</th>
						</tr>
					
					<tbody>
						<?php
                            $getBrand=$brnd->getAllBrand();
                            if ($getBrand) {
                            	$i=0;
                            	while ($result = $getBrand->fetch_assoc() ) {
                            		$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">Edit</a> ||
							 <a onclick=" return confirm('Are you sure to delete?')" href="?delbrand=<?php echo $result['brandId'];?>">Delete</a></td>
						</tr>
					<?php }}?>
						
					</tbody>
				</table><br>
               <!-- </div> -->
               
            </div>
        </div><br><br><br>
         
          
               
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

  