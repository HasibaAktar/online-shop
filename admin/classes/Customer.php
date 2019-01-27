<?PHP 
require_once('inc/db.php');
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');
 ?>

<?php

class Customer 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function customerRegistration($data){
		$name    = mysqli_real_escape_string($this->db->link,$data['name']);
		$addres = mysqli_real_escape_string($this->db->link,$data['addres']);
		$city    = mysqli_real_escape_string($this->db->link,$data['city']);
		$zip     = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone   = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email   = mysqli_real_escape_string($this->db->link,$data['email']);
        $pass    = mysqli_real_escape_string($this->db->link,md5($data['pass']));
            
            if ($name=="" || $addres=="" || $city=="" || $zip=="" || $phone=="" || $email==""|| $pass=="" ) {
        	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	return $msg;
        }

        $mailquery="SELECT * FROM  customer WHERE email='$email' LIMIT 1";
        $mailchk=$this->db->select($mailquery);
        if ($mailchk !=false) {
        	$msg="<span class='error'>Email already exist!</span>";
          	return $msg;
        }else{
        	$query="INSERT INTO  customer(name,addres,city,zip,phone,email,pass ) 
        	VALUES('$name','$addres','$city','$zip','$phone','$email','$pass')";

        	   $inserted_row=$this->db->insert($query);
               if ($inserted_row) {
               $msg = "<span class='success'>Customer Data Inserted Successfully</span>";
               return $msg;
               }else{
               	$msg = "<span class='error'>Customer Data Not Inserted</span>";
               return $msg;
                    }
               }
        }

        public function customerLogin($data){
        	$email   = mysqli_real_escape_string($this->db->link,$data['email']);
            $pass    = mysqli_real_escape_string($this->db->link,md5($data['pass']));

            if (empty($email) || empty($pass )) {
            	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	    return $msg;
            }
            $query="SELECT * FROM customer WHERE email='$email' AND pass='$pass' ";
            $result=$this->db->select($query);
            if ($result!=false) {
            	$value=$result->fetch_assoc();
            	Session::set("cuslogin",true);
            	Session::set("cmrId",$value['id']);
            	Session::set("cmrName",$value['name']);
            	header("location:cart.php");

            }else{

                 $msg="<span class='error'>Email or Password not matched!</span>";
          	     return $msg;

            }



        }

        public function getCustomerData($id){
           $query="SELECT * FROM customer WHERE  id= '$id'";
           $result=$this->db->select($query);
           return $result;
        }

        public function customerUpdate($data,$cmrId){
        $name    = mysqli_real_escape_string($this->db->link,$data['name']);
		$addres = mysqli_real_escape_string($this->db->link,$data['addres']);
		$city    = mysqli_real_escape_string($this->db->link,$data['city']);
		$zip     = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone   = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email   = mysqli_real_escape_string($this->db->link,$data['email']);
        
            
            if ($name=="" || $addres=="" || $city=="" || $zip=="" || $phone=="" || $email=="" ) {
        	$msg="<span class='error'>Fields Must Not Be Empty</span>";
          	return $msg;
        } else{
        	
               $query="UPDATE customer 
                        SET 
                        name   = '$name',
                        addres = '$addres',
                        city   = '$city',
                        zip    = '$zip',
                        phone  = '$phone',
                        email  = '$email'
                        WHERE id='$cmrId'";

                        $updated_row= $this->db->update($query);

                        if ($updated_row) {
                            $msg = "<span class='success'>Customer Data Updated Successfully</span>";
                            return $msg; 
                        }else{

                             $msg = "<span class='error'>Customer Data Not Updated</span>";
                             return $msg;
                        }
                  }

        }


}


?>