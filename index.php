<?php include('partials-front/menu.php');?>

<!--food search section starts here--> 
<section class="food-search text-center">
    <div class ="container">  
     <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
    <input type="search" name="search" placeholder="Search for Food..">
    <input type="submit" name="submit" value="Search" class="btn btn-primary">
    </form>
   </div>
</section>
<!--food search section ends here--> 

<?php

if(isset($_SESSION['order']))    //to display if success or not 
{
   echo $_SESSION ['order'];
   unset($_SESSION['order']);
}

?>

      <!--category  section starts here
      <section class="categories">
        <div class ="container">  
            <h2 class="text-center">Categories</h2> 
           
            
            <a href="categories.html">
            <div class="box-3 float-container">
               <img src="images/pizza.jpg" alt="pizza" class="img-responsive img-curve">
               <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>
            <a href="categories.html">
            <div class="box-3 float-container">
               <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">
               <h3 class="float-text text-white">Burger</h3>
            </div>
         </a>
         <a href="categories.html">
            <div class="box-3 float-container">
               <img src="images/chicken.jpg" alt="Chicken" class="img-responsive img-curve">
               <h3 class="float-text text-white">Nyama</h3>
            </div>
         </a>
            <div class="clearfix"></div>
       </div>
    </section> --> 
    <!--category section ends here--> 



      <!--food menu section starts here--> 
      <section class="food-menu">
         <div class ="container">  
            <h2 class="text-center">Explore Foods</h2>

            <?php
      //Getting Foods from Database that are active and featured
      //SQL Query
      $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured= 'Yes' LIMIT 6";
      //Execute Query 
      $res2= mysqli_query($conn,$sql2);
      //count rows
      $count2=mysqli_num_rows($res2);
      //chck whether food is availilable or not
      if ($count2>0)
      {
         // Food available
         while($row=mysqli_fetch_assoc($res2))
         {
            //get all values
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $description=$row['description'];
            $image_name=$row['image_name'];

            ?>

               <div class="food-menu-box">
               <div class= "food-menu-img">

               <?php  
               //check whether image available or not
               if($image_name=="")
               {
                  // image not available
                  echo "<div class ='error'> Image not Available.</div>";
               }
               else 
               {
                  //image available
                  ?>
                   <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt= "<?php echo $title ?>"  class="img-responsive img-curve">
                  <?php
               }
               ?>

                
               </div>
               <div class= "food-menu-desc">
                  <h4><?php echo $title;?></h4>
                  <p class="food-price">KSH <?php  echo $price; ?></p>
                  <p class="food-detail">
                  <?php  echo $description; ?>  
                  </p>
                  <br>
                  
                  <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
               </div>
               </div>

            <?php
         }
      }
      else
      {
         //Food not available
         echo "<div class='error' >Food Not Available.</div>";
      }

            ?>
          


               <div class="clearfix"></div>
            </div>




       <p class="text-center">
          <a href="foods.php"> See All Foods</a>
      </p>
    </section>

    <?php include('partials-front/footer.php')?>