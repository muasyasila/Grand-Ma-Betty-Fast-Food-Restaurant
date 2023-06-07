<?php
//Authorization- Access Control
//Check whether the user is logged in or not
if (!isset($_SESSION['user']))//if user session is not set
{
// user not logged in
//redirect to log in page with message
$_SESSION['no-login-message']="<div class='error text-center'>Please login to access Admin Panel.</div>";
//rediret to login page
header('location:'.SITEURL.'admin/login.php');
}

?>