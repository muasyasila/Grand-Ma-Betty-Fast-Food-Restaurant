<?php

//include constants.php file here
include('../config/constants.php');

//1 get the id of admin to be deleted
echo  $id=$_GET['id'];

//2.create sql query to delete admin
$sql="DELETE FROM tbl_admin WHERE id=$id";

//Execute the query 
$res=mysqli_query($conn,$sql);

//check whether the query executed successfully or not
if($res==true)
{
    //query execute succesfully and admin delete
    //echo "Admin Deleted" ;
    //create session vriable to display message
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
    //Redirect to manage Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
//failed to delete admin
//echo "Failed to delete admin";
$_SESSION['delete']="<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
header('location:'.SITEURL.'admin/manage-admin.php');
}


?>