
    <?php include('partials-front/menu.php')?>

    <?php
    //check whether food id is set or not
    if(isset($_GET['food_id']))
    {
        // get the food id and details of the selected food
        $food_id = $_GET['food_id'];
        //Get details of the selected food
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //Execute the query 
        $res = mysqli_query($conn, $sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //check whether the data is available or not 
        if ($count==1)
        {
            //we have data
            //Get data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            //Food not available
            // redirect to home page
            header('location:'.SITEURL);
        }
    }
    else
    {
     // reditect to homepage
     header('location:'.SITEURL);
    }
    ?>

    <!-- fOOD SEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action=" " method ="POST" class="order">
                <fieldset>
                    <legend style="color: white;">Selected Food</legend>
                    
                    <div class="food-menu-img">
                        <?php 
                        // Check whether image is available or not
                        if($image_name=="")
                        {
                            //Image not Available
                            echo "<div class='error'> Image not Available.</div>";
                        }
                        else
                        {
                            //Image is Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt= "<?php echo $title ?>" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                   
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 style="color: white;"><?php echo $title; ?> </h3>
                        <input type="hidden" name ="food" value ="<?php echo $title; ?>">
                        <p class="food-price" style="color: white;"><?php echo $price; ?> </p>
                        <input type="hidden" name ="price" value ="<?php echo $price; ?>">
                        <div class="order-label" style="color: white;">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" min="1" value="1" required >
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend style="color: white;">Delivery Details</legend>
                    <div class="order-label" style="color: white;">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Curtis Muasya" class="input-responsive" required>

                    <div class="order-label" style="color: white;">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 0768 ******" class="input-responsive" required>

                    <div class="order-label" style="color: white;">Email</div>
                    <input type="email" name="email" placeholder="E.g. curtiss****@gmail.com" class="input-responsive" required>

                    <div class="order-label" style="color: white;">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                //check whether submit button is clicked or not  
               if(isset($_POST['submit']))
                {
                    //Get all the details from the form
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; //total=price x qty

                    $order_date = date("Y-m-d h:i:sa"); //Order Date

                    $status = "Ordered"; //Ordered, On Delivery, Delivered, Cancelled
                    
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //save the Order in Database
                    //create Sql to save the data
                    $sql2 = "INSERT INTO tbl_order SET
                    food ='$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name ='$customer_name',
                    customer_contact ='$customer_contact',
                    customer_email ='$customer_email',
                    customer_address ='$customer_address' 
                    "; 
                        //echo $sql2; die();

                    //Execute the Query
                    $res2=mysqli_query($conn, $sql2);
                    //check whether query is executed succesfully or not
                    if($res2==true)
                    {
                        //query executed and order saved
                        $_SESSION['order']="<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    } 
                    else
                    {
                        //failed to save order
                        $_SESSION['order']="<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);

                    }

                }
           
            ?>

        </div>
    </section>
    <!-- fOOD SEARCH Section Ends Here -->


    <?php include('partials-front/footer.php')?>