<?php 
include('../config/constants.php');
?>

<html>
    <head>
        <title>Login-Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>   
    
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>

            <br><br>
            <!--Login form starts here-->
            <form action=""method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>   

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br> 

            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br> 

</form>
<!--Log in ends here-->
<p class="text-center">Created By - <a href="www.curtismuasya.com">Curtis Muasya</a></p>
</div>
</body>
</html>
<?php 
//Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // process for login
    //1.get the data from log in form
        $username=$_POST['username'];
        $password= md5($_POST['password']);

    //2.SQL to check whether the user with username and password exist or not
    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    
    //3.execute the query
    $res = mysqli_query ($conn,$sql);

    //4.count rows to check whether the user exixts or not
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //user Available and log in success
        $_SESSION['login']="<div class='success'>Login Successful.</div>";
        $_SESSION['user']=$username;//to check whether the user is logge in or not log out will unset it

        //redirect to home page/ dashloard
        header('location:'.SITEURL.'admin/');
   }
    else
    {
      //user  not Available and log in failed
      $_SESSION['login']="<div class='error text-center'>Username or Password did not match.</div>";
      //redirect to home page/ dashloard
      header('location:'.SITEURL.'admin/');  
      //header('location:'.SITEURL.'admin/login.php');
    }
}
?>