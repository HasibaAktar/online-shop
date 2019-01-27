<?php
require_once('db.php');



/////ADD CATEGORY//////

if(isset($_POST['add-category'])){
    $cat_name=$_POST['cat-name'];
    
    if(empty($cat_name)){
            header('location:../categories.php?error=Category Name Require');
            }
    else{
        $query="INSERT INTO `categories` ( `cat_name`) VALUES ( '$cat_name')";
        if(mysqli_query($conn,$query)){

             header('location:../categories.php?success=Category Has Been Added');
        }
        else{
             header('location:../categories.php?error=This Category Already Exist');
        }
    }
}


////////////UPDATE CATEGORY///////////////

if(isset($_POST['update-category'])){
    $edit_id=$_GET['update_category'];
$up_cat_name=$_POST['up-cat-name'];
    
if(empty($up_cat_name)){
        header("location:../categories.php?uperror=Category Name Require&edit=$edit_id");
       }
   else{
       $query="UPDATE `categories` SET `cat_name` = '$up_cat_name' WHERE `cat_id` = $edit_id";
        if(mysqli_query($conn,$query)){
            
             header("location:../categories.php?upsuccess=Category Has Been Updated&edit=$edit_id");
        }
        else{
             header("location:../categories.php?uperror=This Category Already Exist&edit=$edit_id");
        }    }
}


?>