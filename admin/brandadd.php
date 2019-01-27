
<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Brand.php');?>

<?php
    $brnd=new Brand();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    $brandName = $_POST['brandName'];
    
    $brandName= $brnd->brndInsert($brandName);
   
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <div class="col-md-6">
                    <?php
                       if (isset($brandName)) {
                           echo $brandName;
                       }
                    ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category"></label>

                                    
                                    <input type="text" name="brandName" placeholder="Brand Name" class="form-control">
                                </div>
                                <input type="submit" value="Add Brand" name="add-category" class="btn btn-primary">
                            </form>
                            <br><br>
                           
              
            </div>
        </div>
<?php include 'inc/footer.php';?>