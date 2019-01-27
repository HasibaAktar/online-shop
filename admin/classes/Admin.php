<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
 ?>

<?php

class Admin 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function adminRegistration($data){
    $name    = mysqli_real_escape_string($this->db->link,$data['name']);
    $email = mysqli_real_escape_string($this->db->link,$data['email']);
    $mobile    = mysqli_real_escape_string($this->db->link,$data['mobile']);
    $password    = mysqli_real_escape_string($this->db->link,md5($data['password']));

    if ($name=="" || $email==""||$mobile=="" || $password=="") {
          $msg="<span class='error'>Fields Must Not Be Empty</span>";
            return $msg;
        }

        $mailquery="SELECT * FROM  users WHERE email='$email' LIMIT 1";
        $mailchk=$this->db->select($mailquery);
        if ($mailchk !=false) {
          $msg="<span class='error'>Email already exist!</span>";
            return $msg;
        }else{
          $query="INSERT INTO  users(name,email,mobile,password ) 
          VALUES('$name','$email','$mobile','$password')";

             $inserted_row=$this->db->insert($query);
               if ($inserted_row) {
               $msg = "<span class='success'>Admin Data Inserted Successfully</span>";
               return $msg;
               }else{
                $msg = "<span class='error'>Admin Data Not Inserted</span>";
               return $msg;
                    }
               }

  }
}

?>