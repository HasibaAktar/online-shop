
<?PHP require_once('inc/session.php');
Session::checkLogin();
 require_once('inc/dbclass.php');
 require_once('helpers/format.php');

?>


<?php 
class adminlogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function adminLogin($name,$password){

           $name = $this->fm->validation($name);
           $password = $this->fm->validation($password);

           $name = mysqli_real_escape_string($this->db->link,$name);
           $password = mysqli_real_escape_string($this->db->link,$password);

          if (empty($name) || empty($password)) {
          	$loginmsg="Username and Password Must Required";
          	return $loginmsg;
          }
          else{

          	$query = "SELECT * FROM  users WHERE name='$name' AND password='$password'";
          	$result= $this->db->select($query);
          	if ($result != false) {
          		$value=$result->fetch_assoc();
          		Session::set("adminlogin",true);
          		Session::set("id",$value['id']);
          		Session::set("email",$value['email']);
          		header("location:index.php");
          		# code...
          	}else{
          		$loginmsg="Username and Password Not Match";
          	return $loginmsg;
          	}
          }
 
	}
  public function adminRegistration($data){
    $name    = mysqli_real_escape_string($this->db->link,$data['name']);
    $email = mysqli_real_escape_string($this->db->link,$data['email']);
    // $mobile    = mysqli_real_escape_string($this->db->link,$data['mobile']);
    $password    = mysqli_real_escape_string($this->db->link,md5($data['password']));

    if ($name=="" || $email=="" || $password=="") {
          $msg="<span class='error'>Fields Must Not Be Empty</span>";
            return $msg;
        }

        $mailquery="SELECT * FROM  users WHERE email='$email' LIMIT 1";
        $mailchk=$this->db->select($mailquery);
        if ($mailchk !=false) {
          $msg="<span class='error'>Email already exist!</span>";
            return $msg;
        }else{
          $query="INSERT INTO  users(name,email,password ) 
          VALUES('$name','$email','$password')";

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