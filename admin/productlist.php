<?php require_once('inc/top.php');?>

<?php include 'inc/header.php';?>


<?PHP require_once('classes/Category.php');?>
<?PHP require_once('classes/Product.php');?>
<?php  require_once('helpers/format.php');?>

<?php
    $pd=new Product();
    $fm=new Format();
?>
<?php
  
   $cat=new Category();

   if (isset($_GET['delpro'])) {
   	$id=$_GET['delpro'];
   	$delpro=$pd->delProById($id);
   }
?>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 15px;

}

tr:nth-child(even) {
    background-color: #dddddd;}

.navBAR{margin:0 auto; width:100%;}
.navBAR ul {padding:0;list-style:none;line-height:20px;} /*this will make all links vertically */
.navBAR ul li {float:left; margin:1px; position:relative; background-color:#2EA3E7;border-radius:6px; list-style-type:none;}
.navBAR ul li a {text-decoration: none;color: white;padding:10px;display: block;width:135px;text-align:center;}
.navBAR ul li ul{position:absolute; visibility:hidden;}
.navBAR ul li:hover ul{visibility:visible;}
.navBAR ul li a:hover{color:white;}
.navBAR ul li:hover{background-color:#2EA3E7;}



</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block"> 

          <?php
                   if (isset($delpro)) {
                   	echo $delpro;
                   	# code...
                   }
                 
           ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr style="background-color:#653091">
					<th style="color:white;">SL</th>
					<th style="color:white;">Product Name</th>
					<th style="color:white;">Category</th>
          <th style="color:white;">Brand</th>
					<th style="color:white;">Description</th>
					<th style="color:white;">Price</th>
					<th style="color:white;">Image</th>
					<th style="color:white;">Type</th>
					<th style="color:white;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
                  $getPd=$pd->getAllProduct();
                  if ($getPd) {
                  	$i=0;
                  	while ($result=$getPd->fetch_assoc()) {
                  		$i++;
                  
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['catName'];?></td>
          <td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->textShorten($result['body'],40);?></td>
					<td>Tk.<?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?>" height="50px" width="60px"/></td>
					<td><?php 
					 if ($result['type']==0) {
					 	echo "Featured";
					 }else{
					 	echo "General";
					 }

					?>
						
					</td>
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> ||
				     <a onclick=" return confirm('Are you sure to delete?')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>
		        <?php 	} }?>
			</tbody>
		</table>


       </div>
    </div>

</div>
 <div class="navBAR">
      <ul>
      <li><a href="addproduct.php">Add Product</a></li>
      </ul>
  </div>
  <div class="navBAR">
      <ul>
      <li><a href="index.php">BACK</a></li>
      </ul>
  </div>



<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>

