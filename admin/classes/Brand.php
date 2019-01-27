<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
 ?>


<?php 

class Brand 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function brndInsert($brandName){
          $brandName = $this->fm->validation($brandName);
          $brandName = mysqli_real_escape_string($this->db->link,$brandName);

           if (empty($brandName)) {
          	$msg="<span class='error'>Brand name Must Required</span>";
          	return $msg;
          } else{
               $query = "INSERT INTO brand(brandName) VALUES ('$brandName')";
               $brandinsert=$this->db->insert($query);
               if ($brandinsert) {
               $msg = "<span class='success'>Brand Name Inserted Successfully</span>";
               return $msg;
               }else{
               	$msg = "<span class='error'>Brand Name Not Inserted</span>";
               return $msg;
               }

          }
	}

	 public function getAllBrand(){
          $query="SELECT * FROM brand ORDER BY brandId  DESC";
          $result=$this->db->select($query);
          return $result;
     }

     public function getBrandById($id){
          $query="SELECT * FROM brand WHERE brandId='$id'";
          $result=$this->db->select($query);
          return $result;
     }

     public function brandUpdate($brandName,$id){
          $brandName = $this->fm->validation($brandName);
          $brandName = mysqli_real_escape_string($this->db->link,$brandName);
          $id= mysqli_real_escape_string($this->db->link,$id);
          
             if (empty($brandName)) {
               $msg="<span class='error'>Brand name Must Required</span>";
               return $msg;
              }else{
               $query="UPDATE brand 
                        SET brandName = '$brandName'
                        WHERE brandId='$id'";

                        $updated_row= $this->db->update($query);

                        if ($updated_row) {
                            $msg = "<span class='success'>Brand Updated Successfully</span>";
                            return $msg; 
                        }else{

                             $msg = "<span class='error'>Brand Not Updated</span>";
                             return $msg;
                        }
                  }

            }

             public function delBrandById($id){
              $query="DELETE FROM brand WHERE brandId='$id'";

              $deldata=$this->db->delete($query);
              if ($deldata) {
                $msg = "<span class='success'>Brand Name Deleted Successfully</span>";
                return $msg; 
              }else{
                 $msg = "<span class='success'>Brand Name Not Deleted </span>";
                 return $msg; 
                    }
            }
	
}
?>