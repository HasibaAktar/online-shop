<?php require_once('inc/top.php');?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Category.php');?>
<?php
   $cat=new Category();

   if (isset($_GET['delcat'])) {
   	$id=$_GET['delcat'];
   	$delCat=$cat->delCatById($id);
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

                <h2>Category List</h2>
                <?php
                   if (isset($delCat)) {
                    echo $delCat;
                    # code...
                   }
                 
                ?>
                
               <!--  <div class="block">   -->      
                    <table border="1 px solid" style="float: right;">
					
						<tr style="background-color:#653091;">
              <th style="color: white">Serial No....</th>
							<th style="color: white">Category Name....</th>
							
							<th style="color: white">Action</th>
						</tr>
					
					<tbody>
						<?php
                            $getCat=$cat->getAllCat();
                            if ($getCat) {
                            	$i=0;
                            	while ($result = $getCat->fetch_assoc() ) {
                            		$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Edit</a> ||
							 <a onclick=" return confirm('Are you sure to delete?')" href="?delcat=<?php echo $result['catId'];?>">Delete</a></td>
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

 