<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helper/format.php');
 ?>



<?php

class Product {
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productInsert($data, $file){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
		$body        = mysqli_real_escape_string($this->db->link,$data['body']);
		$price       = mysqli_real_escape_string($this->db->link,$data['price']);
		$type        = mysqli_real_escape_string($this->db->link,$data['type']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;


        if ($productName=="" || $catId=="" || $productName=="" || $body=="" || $price=="" || $file_name==""|| $type=="" ) {
        	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	return $msg;
        }elseif ($file_size>1048567) {
        	echo "<span class='error'>Image size should be less then 1MB!</span>";
        }
        elseif (in_array($file_ext, $permited)==false) {
        	echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
        }

        else{

        	move_uploaded_file($file_temp, $uploaded_image);
        	$query="INSERT INTO  product(productName,catId,body,price,type,image ) 
        	               VALUES('$productName','$catId','$body','$price','$type','$uploaded_image')";

        	   $inserted_row=$this->db->insert($query);
               if ($inserted_row) {
               $msg = "<span class='success'>Product Inserted Successfully</span>";
               return $msg;
               }else{
               	$msg = "<span class='error'>Product Not Inserted</span>";
               return $msg;
               }
        }

	}

	public function getAllProduct(){
		$query="SELECT product.*,category.catName FROM  product
		INNER JOIN category ON product.catID=category.catId
        ORDER BY product.productId DESC";
		$result=$this->db->select($query);
		return $result;
	}

	public function getProById($id){
		$query="SELECT * FROM product WHERE  productId= '$id'";
          $result=$this->db->select($query);
          return $result;
	}
	public function productUpdate($data, $file,$id){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
		$body        = mysqli_real_escape_string($this->db->link,$data['body']);
		$price       = mysqli_real_escape_string($this->db->link,$data['price']);
		$type        = mysqli_real_escape_string($this->db->link,$data['type']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;


        if ($productName=="" || $catId=="" || $productName=="" || $body=="" || $price=="" || $type=="" ) {
        	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	return $msg;
        }else{
        	if (!empty($file_name)) {
        

                if ($file_size>1048567) {
        	     echo "<span class='error'>Image size should be less then 1MB!</span>";
                     }
                 elseif (in_array($file_ext, $permited)==false) {
        	      echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
                     }

                 else{

        	       move_uploaded_file($file_temp, $uploaded_image);
        	        $query="UPDATE product
        	                SET 
        	                productName='$productName',
        	                catId      ='$catId',
        	                body       ='$body',
        	                price      ='$price',
        	                type       ='$type',
        	                image      ='$uploaded_image'
        	                WHERE productId='$id'";

        	          $updated_row=$this->db->update($query);
                     if ($updated_row) {
                     $msg = "<span class='success'>Product Updated Successfully</span>";
                     return $msg;
                     }else{
               	     $msg = "<span class='error'>Product Not Updated</span>";
                     return $msg;
               }
        }
    }   

              else{
          
        	        $query="UPDATE product
        	                SET 
        	                productName='$productName',
        	                catId      ='$catId',
        	                body       ='$body',
        	                price      ='$price',
        	                type       ='$type'
        	                
        	                WHERE productId='$id'";

        	          $updated_row=$this->db->update($query);
                     if ($updated_row) {
                     $msg = "<span class='success'>Product Updated Successfully</span>";
                     return $msg;
                     }else{
               	     $msg = "<span class='error'>Product Not Updated</span>";
                     return $msg;
                          }

                    }

    }

	}

	public function delProById($id){
            $query="SELECT * FROM product WHERE productId='$id'";
            $getData=$this->db->select($query);
            if ($getData) {
            	while ($delImg=$getData->fetch_assoc()) {
            		$dellink=$delImg['image'];
            		unlink($dellink);
            	}
            }

            $delquery="DELETE FROM product WHERE productId='$id'";
            $deldata=$this->db->delete($delquery);
            if ($deldata) {
                $msg = "<span class='success'>Product Deleted Successfully</span>";
                return $msg; 
              }else{
                 $msg = "<span class='success'>Product Not Deleted </span>";
                 return $msg; 
                    }


           }


           public function getFeaturedProduct(){
              $query="SELECT * FROM product   WHERE type='0' ORDER BY productId  DESC LIMIT 12";
              $result=$this->db->select($query);
              return $result;
              }

           public function getNewProduct(){
              $query="SELECT * FROM product    ORDER BY productId  DESC LIMIT 5";
              $result=$this->db->select($query);
              return $result;

           }

           public function getSingleProduct($id){
             $query="SELECT p.*,c.catName,b.brandName FROM product as p,category as c,brand as b 
             WHERE p.catId=c.catId AND p.brandId=b.brandId AND p.productId='$id'"; 
             $result=$this->db->select($query);
             return $result;

           }

           public function productByCat($id){
            //$catId        = mysqli_real_escape_string($this->db->link,$id);
            $query="SELECT * FROM product WHERE  catId= '$id'";
            $result=$this->db->select($query);
            return $result;



           }

            public function productByBrand($id){
            //$catId        = mysqli_real_escape_string($this->db->link,$id);
            $query="SELECT * FROM product WHERE  brandId= '$id'";
            $result=$this->db->select($query);
            return $result;

            }

    public function insertCompareData($cmprid,$cmrId){
      $cmrId        = mysqli_real_escape_string($this->db->link,$cmrId);
      $productId        = mysqli_real_escape_string($this->db->link,$cmprid);

      $cquery="SELECT * FROM compare WHERE  cmrId= '$cmrId' AND productId='$productId'";
      $check=$this->db->select($cquery);
      if ($check) {
        $msg = "<span class='error'>Already Added </span>";
        return $msg;
      }

      $query="SELECT * FROM product WHERE  productId= '$productId'";
      $result=$this->db->select($query)->fetch_assoc();

          if ($result) {
           
              $productId=$result['productId'];
              $productName=$result['productName'];
              $body=$result['body'];
              
              $price=$result['price'];
              $image=$result['image'];
          $query="INSERT INTO   compare (cmrId ,productId ,productName,body ,price ,image ) 
                VALUES('$cmrId ','$productId ','$productName ','$body','$price ','$image ')";

          $inserted_row=$this->db->insert($query);
          if (isset($inserted_row)) {
            $msg = "<span class='success'> Added!Check Compare Page</span>";
                return $msg; 
              }else{
                 $msg = "<span class='error'>Product Not Added </span>";
                 return $msg; 
                    }


            } 

    }

    public function getComparedData($cmrId){
      $query="SELECT * FROM compare WHERE cmrId='$cmrId' ORDER BY id DESC";
      $result=$this->db->select($query);
      return $result; 
    }

    public function delComparedData($cmrId){
       $delquery="DELETE FROM compare WHERE cmrId='$cmrId'";
       $deldata=$this->db->delete($delquery);

    }

    public function saveWishlistData($id,$cmrId){

      $cquery="SELECT * FROM wlist WHERE  cmrId= '$cmrId' AND productId='$id'";
      $check=$this->db->select($cquery);
      if ($check) {
        $msg = "<span class='error'>Already Added </span>";
        return $msg;
      }
      
      $pquery="SELECT * FROM product WHERE  productId= '$id'";
      $result=$this->db->select($pquery)->fetch_assoc();

      if ($result) {
       $productId=$result['productId'];
       $productName=$result['productName'];
       $price=$result['price'];
       $image=$result['image'];

    $query="INSERT INTO   wlist (cmrId ,productId ,productName ,price ,image ) 
    VALUES('$cmrId ','$productId ','$productName ','$price ','$image ')";

          $inserted_row=$this->db->insert($query);
          if (isset($inserted_row)) {
            $msg = "<span class='success'> Added!Check Wishlist Page</span>";
                return $msg; 
              }else{
                 $msg = "<span class='error'>Product Not Added </span>";
                 return $msg; 
                    }


            } 

    }

    public function checkWlistData($cmrId){
      $query="SELECT * FROM wlist WHERE cmrId='$cmrId' ORDER BY id DESC";
      $result=$this->db->select($query);
      return $result;
    }

    public function delWlistData($cmrId,$productId){
       $delquery="DELETE FROM wlist WHERE cmrId='$cmrId' AND productId='$productId'";
       $deldata=$this->db->delete($delquery);

    }

    


}


?>