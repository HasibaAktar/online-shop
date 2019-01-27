<?php
ob_start();
?>
<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helper/format.php');
 ?>

<?php

class Cart 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addToCart($quantity,$id){
		 $quantity = $this->fm->validation($quantity);
         $quantity = mysqli_real_escape_string($this->db->link,$quantity);
         $productId = mysqli_real_escape_string($this->db->link,$id);
         $sId=session_id();

         $squery="SELECT * FROM product WHERE productId='$productId'";
         $result=$this->db->select($squery)->fetch_assoc();

         $productName=$result['productName'];
         $price=$result['price'];
         $image=$result['image'];


          $chquery="SELECT * FROM cart WHERE productId='$productId' AND sId='$sId'";
          $getPro=$this->db->select($chquery);
          if ($getPro) {
          	$msg="Product Already Added";
          	return $msg;
          }else{

               $query="INSERT INTO  cart(sId,productId,productName,quantity,price,image) 
        	      VALUES('$sId','$productId','$productName','$quantity','$price','$image')";

        	  
        	   $inserted_row=$this->db->insert($query);
               if ($inserted_row) {
               header("location:cart.php");
               ob_end_flush();
               }else{
               header("location:404.php");
               }
        }
    }

        public function getCartProduct(){
           $sId=session_id();
           $query="SELECT * FROM cart WHERE  sId= '$sId'";
           $result=$this->db->select($query);
           return $result;

        }

        public function updateCartQuantity($cartId,$quantity){

        	$cartId = mysqli_real_escape_string($this->db->link,$cartId);
        	$quantity = mysqli_real_escape_string($this->db->link,$quantity);

        	$query="UPDATE cart 
                        SET quantity = '$quantity'
                        WHERE cartId='$cartId'";

                        $updated_row= $this->db->update($query);

                        if ($updated_row) {
                            $msg = "<span class='success'>Quantity Updated Successfully</span>";
                            return $msg; 
                        }else{

                             $msg = "<span class='error'>Quantity Not Updated</span>";
                             return $msg;
                        }
        }

        public function delProductByCart($delId){
        	  $delId = mysqli_real_escape_string($this->db->link,$delId);
              $query="DELETE FROM cart WHERE cartId='$delId'";

              $deldata=$this->db->delete($query);
              if ($deldata) {
                echo "<script>window.location='cart.php';</script>";
              }else{
                 $msg = "<span class='success'>Category Not Deleted </span>";
                 return $msg; 
                    }
        }
        public function checkCartTable(){

        	$sId=session_id();
          $query="SELECT * FROM cart WHERE  sId= '$sId'";
        	$result=$this->db->select($query);
        	return $result;
        }

        public function delCustomerCart(){
          $sId=session_id();
          $query="DELETE FROM cart WHERE sId='$sId'";
          $this->db->delete($query);

        }

        public function orderProduct($cmrId){
          $sId=session_id();
          $query="SELECT * FROM cart WHERE  sId= '$sId'";
          $getPro=$this->db->select($query);

          if ($getPro) {
            while ($result=$getPro->fetch_assoc()) {
              $productId=$result['productId'];
              $productName=$result['productName'];
              $quantity=$result['quantity'];
              $price=$result['price'] *$quantity;
              $image=$result['image'];
               $query="INSERT INTO   tbl_order (cmrId ,productId ,productName ,quantity ,price ,image ) 
                VALUES('$cmrId ','$productId ','$productName ','$quantity ','$price ','$image ')";

            
                $inserted_row=$this->db->insert($query);
            } }

        }

        public function payableAmount($cmrId){

          $query="SELECT price FROM tbl_order WHERE  cmrId= '$cmrId' AND date= now()";
          $result=$this->db->select($query);
          return $result;


        }

        public function getOrderedProduct($cmrId){

          $query="SELECT * FROM tbl_order WHERE  cmrId= '$cmrId' ORDER BY date DESC";
          $result=$this->db->select($query);
          return $result;


        }

        public function productShiftConfirm($id,$time,$price){
               $id = mysqli_real_escape_string($this->db->link,$id);
               $time = mysqli_real_escape_string($this->db->link,$time);
               $price = mysqli_real_escape_string($this->db->link,$price);

               $query="UPDATE tbl_order 
                        SET status = '2'
                        WHERE cmrId='$id' AND date='$time' AND price='$price'";

                        $updated_row= $this->db->update($query);

                        if ($updated_row) {
                            $msg = "<span class='success'> Updated Successfully</span>";
                            return $msg; 
                        }else{

                             $msg = "<span class='error'> Not Updated</span>";
                             return $msg;
                        }

        }

        public function checkOrderTable($cmrId){
          
          $query="SELECT * FROM  tbl_order WHERE  cmrId= '$cmrId'";
          $result=$this->db->select($query);
          return $result;
        }

        

}
?>