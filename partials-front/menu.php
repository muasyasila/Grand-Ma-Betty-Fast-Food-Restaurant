<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--important to make website responsive-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAST FOOD RESTURANT</title>
    <!--Link our CSS file-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--Navbar section starts here--> 
   <section class="Navbar">
       <div class ="container">  
         <div class="logo">
            <img src="images/logo.png" alt="Resturant logo" class="img-responsive" >
            
         </div>
         <div class= "menu text-right">
            <ul>
               <li>
                  <a href="<?php echo SITEURL; ?>">Home</a>
               </li>
               <!--<li>
                  <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
               </li>-->
               <li>
                  <a href="<?php echo  SITEURL; ?>foods.php">Foods</a>
               </li>
               <!--<li>
                  <a href="<?php echo  SITEURL; ?>contact.php">Contact</a>
               </li>
               -->
            </ul>
         </div>
         <div class="clearfix"></div>
       </div>
   </section>
   <!--Navbar section ends here--> 
