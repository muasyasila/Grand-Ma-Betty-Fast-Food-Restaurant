
    <?php include('partials-front/menu.php')?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

             // display foods tha are active
             $sql="SELECT * FROM tbl_food WHERE active ='Yes'";
             // Execute the query
             $res=mysqli_query($conn, $sql);
             //count rows 
             $count=mysqli_num_rows($res);

             //check whether the foods are available or not
             if ($count>0)
             {
                 //foods available
                 while ($row=mysqli_fetch_assoc($res))
                 {
                     //get the values
                     $id = $row['id'];
                     $title = $row['title'];
                     $description = $row['description'];
                     $price = $row['price'];
                     $image_name = $row['image_name'];

                     ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">

                                <?php
                                 //check whether image available or not
                                 if($image_name=="")
                                 {
                                     //image not available
                                     echo "<div class='error'> Image not Available.</div>";
                                 }
                                 else
                                 {
                                    //image available
                                    ?>
         <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Smoked Chicken Sausage Pizza" class="img-responsive img-curve">
                                    <?php
                                 }
                                ?>

                                   <!-- <img src="images/menu-pizza.jpg" alt="Smoked Chicken Sausage Pizza" class="img-responsive img-curve">
                                -->
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">KSH <?php echo $price; ?></p>
                                    <p class="food-detail">
                                    <?php echo $description; ?>
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
                 //Food not Available
                 echo "<div class='error'>Food not Found.</div>";
             }

            ?>

<!--
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Smoked Chicken Sausage Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoked Chicken Sausage Pizza</h4>
                    <p class="food-price"> 800 KSH</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            -->






           <!--
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-chicken.jpg" alt="RoseMary Chicken" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>RoseMary Chicken</h4>
                    <p class="food-price"> 1200 KSH</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-fries.jpg" alt="French Fries" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>French Fries</h4>
                    <p class="food-price"> 500 KSH</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Big MAX combo (Burger + Fries) Special Offer" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Big MAX combo (Burger + Fries) Special Offer</h4>
                    <p class="food-price"><strike> 1000 KSH</strike> 800 KSH</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-hotdog.jpg" alt="Seattle Style Hotdog" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Seattle Style Hotdog</h4>
                    <p class="food-price"> 200 KSH </p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-frenchtoast.jpg" alt="Banana French Toast with Blueberries" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Banana French Toast with Blueberries</h4>
                    <p class="food-price">300 KSH</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

-->
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php')?>