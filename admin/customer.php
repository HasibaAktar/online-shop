
<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?php include 'inc/sidebar.php';?>
<?PHP require_once('classes/Customer.php');?>

<?php
if (!isset($_GET['custId']) || $_GET['custId']==NULL) {
    echo "<script>window.location='inbox.php';</script>";
    }else{
        $id=$_GET['custId'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST') {
       echo "<script>window.location='inbox.php';</script>";
    
}
?>
<style>
.form{width: 600px;margin:0 auto;}
.form tr td{text-align: justify;}
.form input[type="text"]{width:400px;padding:5px;font-size: 15px;}


</style>
        <div class="">
            <div class="box round first grid">
                <h2>Customer Details</h2>
                <div class="col-md-6">
                    
                    <?php
                      $cus=new Customer();
                      $getCust=$cus->getCustomerData($id);
                      if ($getCust){
                          while ($result=$getCust->fetch_assoc()) {
                            
                    ?>
                            <form action="" method="post">

                              <table class="form">
                                <tr>
                                  <td style="color:green;font-size: 18px;">Name:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['name'];?>" class=""/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color:green;font-size: 18px;">Address:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['addres'];?>" class=""/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color:green;font-size: 18px;">City:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['city'];?>" class=""/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color:green;font-size: 18px;">ZipCode:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['zip'];?>" class="medium"/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color:green;font-size: 18px;">Phone:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>" class=""/>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color:green;font-size: 18px;">Email:</td>
                                  <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class=""/>
                                  </td>
                                </tr>




                                <tr>
                                  <td style="font-size: 18px;">
                                    <input type="submit" name="submit" value="Ok"/> 
                                  </td>
                                </tr>
                                

                              </table>
                            </form>
                             <?php }  }  ?>
                            
                           
              
            </div>
        </div>
      </div>
