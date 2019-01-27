
<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Category.php');?>

<?php
if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
    echo "<script>window.location='catlist.php';</script>";
    }else{
        $id=$_GET['catid'];
    }
    $cat=new Category();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    $catName = $_POST['catName'];
    $updateCat= $cat->catUpdate($catName,$id);
   
}
?>
<style>
    
.navBAR{margin:0 auto; width:100%;}
.navBAR ul {padding:0;list-style:none;line-height:17px;} /*this will make all links vertically */
.navBAR ul li {float:left; margin:1px; position:relative; background-color:#2EA3E7;border-radius:6px; list-style-type:none;}
.navBAR ul li a {text-decoration: none;color: white;padding:10px;display: block;width:135px;text-align:center;}
.navBAR ul li ul{position:absolute; visibility:hidden;}
.navBAR ul li:hover ul{visibility:visible;}
.navBAR ul li a:hover{color:white;}
.navBAR ul li:hover{background-color:#2EA3E7;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <div class="col-md-6">
                    <?php
                       if (isset($updateCat)) {
                           echo $updateCat;
                       }
                    ?>
                    <?php
                      $getCat=$cat->getCatById($id);
                      if ($getCat){
                          while ($result=$getCat->fetch_assoc()) {
                            
                    ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category"></label>

                                    
                                    <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="form-control">
                                </div>
                                <input type="submit" value="Update Category" name="add-category" class="btn btn-primary">
                                <div class="navBAR">
                                   <ul>
                                   <li><a href="catlist.php">Categories</a></li>
                                   </ul></div>
                               </form>
                        <?php }  }  ?>
                            <br><br>
                           
              
            </div>
        </div>
<?php include 'inc/footer.php';?>