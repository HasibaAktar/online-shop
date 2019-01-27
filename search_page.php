<?php require_once('inc/newheader.php');?>
<div class="content_top">
    		
    		<div class="heading">
    		<h3>Searched Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
<?php 
$conn=mysqli_connect("localhost","root","","dreamland");

$val= $_POST['p_search'];

if ($val) {
	$result="SELECT * FROM product WHERE productName like '%$val%'";?>
	<?php
	$show=mysqli_query($conn,$result);
	while ($rows=mysqli_fetch_array($show)) {
	?>
		<!-- echo $rows['productName'];
		echo "<br/>";
		echo $rows['price'];
		echo "<br/>";
		echo $rows['image'];

		
		echo "<br/>"; -->
		

		<div class="grid_1_of_4 images_1_of_4" style="margin:1px;margin-left:20px;">
					 <a href="details.php?proid=<?php echo $rows['productId'];?>"><img src="admin/<?php echo $rows['image'];?>" alt="" /></a>

					 <h2><?php echo $rows['productName'];?></h2>

					

					 <p><span class="price">Tk.<?php echo $rows['price'];?></span></p>


				     <div class="button"><span><a href="details.php?proid=<?php echo $rows['productId'];?>" class="details">Details</a></span></div>
				     
				</div>
				
			<?php }}

			?>





