<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset ($_SESSION['add']);
}
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset ($_SESSION['upload']);
}
?>
<br><br>

        <!--Add category form starts-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name ="title" placeholder="Category Title">
                    </td>
                    </tr>
        
                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>

                    </tr>
                <tr>
                <td>Featured:   </td>
                <td>
                    <input type="radio" name ="featured" value="Yes">Yes
                    <input type="radio" name ="featured" value="No">No
                </td>   
            </tr>
            <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name ="active" value="Yes">Yes
                        <input type="radio" name ="active" value="No">No
                    </td>
                    </tr>
            <tr>
                <td colspan="2"> 
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary" >
                </td>   
            </tr>
           </table>
        </form>
        <!--Add category form ends-->
        <?php 
            //Check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1.get the value from catergories form
                $title=$_POST['title'];
                //for radio input, we need to check whether the button is selected or not 
                if(isset($_POST['featured']))
                {
                    //get the value from form
                    $featured=$_POST['featured'];
                }
                else
                {
                    //set the default value
                    $featured="No";
                }
                if(isset($_POST['active']))
                {
                    //get the value from form
                    $active =$_POST['active'];
                }
                else
                {
                    //set the default value
                    $active="No";
                }

                //check whether the image is selected or not and set the value for the image accordingly
                //print_r($_FILES['image']);
                //die ();// break the code here

                //bracket was here }

                if(isset($_FILES['image']['name]']))
                {
                    //uploadthe image
                    // to upload image we need image name, source path and destination path

                    $image_name= $_FILES['image']['name'];
                    //Auto rename our image
                    //get the extension of the image (jpg,png)
                    $tpl=explode('.',$image_name);
                    $ext=end($tpl);
                    //rename image
                    $image_name="Food_Category_".rand(000,999).'.'.$ext; 
                    $source_path= $_FILES['image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;
                    //upload image
                    $upload=move_uploaded_file($source_path, $destination_path);
                    // check whether the image is uploaded or not
                    //and if its not uploaded then we will stop the process and redirect with error message
                   if($upload==false)
                    {
                        //set message
                        $_SESSION['upload']="<div class ='error'> Failed to upload Image.</div>";
                        //redirect to add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                    }
                //}  //will try to remove this}     worked first      
                   else
                    {
                        // dont upload image and set the image_name as blank
                        $image_name="";
                    }

                }// trying and worked

                    //2.create  SQL query to insert category into database
                    $sql="INSERT INTO tbl_category SET
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'
                        ";
               
                        //3.execute the query and save in database
                        $res=mysqli_query($conn,$sql);
                
                        //4.check whether the query executed or not and data added or not
                        if($res==true)
                        {
                            //Query executed and category added
                            $_SESSION['add']="<div class ='success'> Category Added Succesfully.</div>";
                            //redirect to manage category page
                            header('location:'.SITEURL.'admin/manage-category.php');
                        }
                        else
                        {
                            //failed to add category
                            $_SESSION['add']="<div class ='error'> Failed to Add Category.</div>";
                            //redirect to manage category page
                            header('location:'.SITEURL.'admin/add-category.php');
                        }
                    
                // }was here
            } //this was not here
        ?>
    </div>
</div>

<?php include('partials/footer.php')?>

