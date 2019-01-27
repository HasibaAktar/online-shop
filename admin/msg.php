<?php require_once('inc/top.php');?>

<?php include 'inc/header.php';?>


<?PHP require_once('classes/Category.php');?>
<?PHP require_once('classes/Product.php');?>
<?php  require_once('helpers/format.php');?>

<?php
    $pd=new Product();
    $fm=new Format();
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
        <h2>Messages</h2>
        <div class="block"> 

         
            <table class="data display datatable" id="example">
			<thead>
				<tr style="background-color:#653091">
          <th style="color: white">SL</th>
					<th style="color: white">Name</th>
					<th style="color: white">Email</th>
					<th style="color: white">Mobile</th>
					<th style="color: white">Message</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
        $cat=new Category();
                            $getmsg=$cat->getAllMsg();
                            if ($getmsg) {
                              $i=0;
                              while ($result = $getmsg->fetch_assoc() ) {
                                $i++;
            ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['name'];?></td>
					<td><?php echo $result['email'];?></td>
          <td><?php echo $result['mobile'];?></td>
					<td><?php echo $fm->textShorten($result['subject'],80);?></td>
					
					
					
				</tr>
		        <?php 	} }?>
			</tbody>
		</table>


       </div>
    </div>

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

