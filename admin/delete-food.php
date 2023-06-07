<?php
// echo "Delete Food Page";

//include constants.php file here
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))// use && or AND
{
    //Process to delete
    // echo "process to delete"
    
    //1. Get ID and Image Name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //2. Remove the image if available
    //check whether the image is available or not and delete only if available
    if($image_name != "")
    {
        //it has image and need to remove from folder
        //get the image path
        $path = "../images/food/".$image_name;
        
        //remove image file from folder
        $remove = unlink($path);
        
        //check whether the image is removed or not
        if($remove==false)
        {
            //failed to remove image
            $_SESSION['upload']="<div class='error'>Failed to Remove Image File.</div>";
            //redirect to manage food
            header('location:'.SITEURL.'admin/manage-food.php');
            //stop the process of deleting food
            die();
        }
    }
    
    //3. Delete food from database
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query is executed or not and set the session message respectively
        //4. Redirect to manage food with session message
    if($res==true)
    {
        //Food Deleted
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else
    {
        //failed to delete food
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }



}
else
{
    //redirect to manage food page
    //echo "redirect";
    $_SESSION['unauthorize'] = "<div class= 'error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}

?>





