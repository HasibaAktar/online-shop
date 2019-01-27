<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
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
	public function getAllOrderProduct(){
		$query="SELECT * FROM tbl_order  ORDER BY id";
        $result=$this->db->select($query);
        return $result;
	}

	public function productShifted($id,$time,$price){
		 $id = mysqli_real_escape_string($this->db->link,$id);
		 $time = mysqli_real_escape_string($this->db->link,$time);
		 $price = mysqli_real_escape_string($this->db->link,$price);
		 $query="UPDATE tbl_order 
                        SET status = '1'
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

	public function delProductShifted($id,$time,$price){
		 $id = mysqli_real_escape_string($this->db->link,$id);
		 $time = mysqli_real_escape_string($this->db->link,$time);
		 $price = mysqli_real_escape_string($this->db->link,$price);


		  $query="DELETE FROM tbl_order WHERE cmrId='$id' AND date='$time' AND price='$price'";
              $deldata=$this->db->delete($query);
              if ($deldata) {
                $msg = "<span class='success'> Deleted Successfully</span>";
                return $msg; 
              }else{
                 $msg = "<span class='error'>Not Deleted </span>";
                 return $msg; 
                    }
	}



}

?>