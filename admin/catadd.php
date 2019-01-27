
<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Category.php');?>

<?php
    $cat=new Category();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    $catName = $_POST['catName'];
    
    $insertCat= $cat->catInsert($catName);
   
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <div class="col-md-6">
                    <?php
                       if (isset($insertCat)) {
                           echo $insertCat;
                       }
                    ?>
                            <form action="catadd.php" method="post">
                                <div class="form-group">
                                    <label for="category"></label>

                                    
                                    <input type="text" name="catName" placeholder="Category Name" class="form-control">
                                </div>
                                <input type="submit" value="Add Category" name="add-category" class="btn btn-primary">
                            </form>
                            <br><br>
                           
              
            </div>
        </div>
<?php include 'inc/footer.php';?>