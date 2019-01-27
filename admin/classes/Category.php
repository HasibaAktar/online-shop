
<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
 ?>


<?php

class Category
{
	
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function catInsert($catName){
          $catName = $this->fm->validation($catName);
          $catName = mysqli_real_escape_string($this->db->link,$catName);

           if (empty($catName)) {
          	$msg="<span class='error'>Category name Must Required</span>";
          	return $msg;
          } else{
               $query = "INSERT INTO category(catName) VALUES ('$catName')";
               $catinsert=$this->db->insert($query);
               if ($catinsert) {
               $msg = "<span class='success'>Category Inserted Successfully</span>";
               return $msg;
               }else{
               	$msg = "<span class='error'>Category Not Inserted</span>";
               return $msg;
               }

          }
	}

     public function getAllCat(){
          $query="SELECT * FROM category ORDER BY catId  DESC";
          $result=$this->db->select($query);
          return $result;
     }
      public function getCatById($id){
          $query="SELECT * FROM category WHERE catId='$id'";
          $result=$this->db->select($query);
          return $result;
     }
     public function catUpdate($catName,$id){
          $catName = $this->fm->validation($catName);
          $catName = mysqli_real_escape_string($this->db->link,$catName);
          $id= mysqli_real_escape_string($this->db->link,$id);
          
             if (empty($catName)) {
               $msg="<span class='error'>Category name Must Required</span>";
               return $msg;
              }else{
               $query="UPDATE category 
                        SET catName = '$catName)'
                        WHERE catId='$id'";

                        $updated_row= $this->db->update($query);

                        if ($updated_row) {
                            $msg = "<span class='success'>Category Updated Successfully</span>";
                            return $msg; 
                        }else{

                             $msg = "<span class='error'>Category Not Updated</span>";
                             return $msg;
                        }
                  }

            }

            public function delCatById($id){
              $query="DELETE FROM category WHERE catId='$id'";

              $deldata=$this->db->delete($query);
              if ($deldata) {
                $msg = "<span class='success'>Category Deleted Successfully</span>";
                return $msg; 
              }else{
                 $msg = "<span class='success'>Category Not Deleted </span>";
                 return $msg; 
                    }
            }

            public function getAllMsg(){
          $query="SELECT * FROM contact";
          $result=$this->db->select($query);
          return $result;
     }


}
?>