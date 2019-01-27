<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
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
        $brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
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


        if ($productName=="" || $catId=="" || $brandId=="" ||  $body=="" || $price=="" || $file_name==""|| $type=="" ) {
        	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	return $msg;
        }elseif ($file_size>2048567) {
        	echo "<span class='error'>Image size should be less then 2MB!</span>";
        }
        elseif (in_array($file_ext, $permited)==false) {
        	echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
        }

        else{

        	move_uploaded_file($file_temp, $uploaded_image);
        	$query="INSERT INTO  product(productName,catId,brandId,body,price,type,image ) 
        	               VALUES('$productName','$catId','$brandId','$body','$price','$type','$uploaded_image')";

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
		$query="SELECT product.*,category.catName,brand.brandName FROM  product
		INNER JOIN category ON product.catID=category.catId
        INNER JOIN brand ON product.brandID=brand.brandId
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
        $brandId       = mysqli_real_escape_string($this->db->link,$data['brandId']);
        
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


        if ($productName=="" || $catId=="" || $brandId=="" ||  $body=="" || $price=="" || $type=="" ) {
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
                            brandId      ='$brandId',
                            
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
                            brandId      ='$brandId',
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

           public function msgFromContact($id){
            $query="SELECT * FROM contact";
            $getMsg=$this->db->select($query);

           }

           


}

?>