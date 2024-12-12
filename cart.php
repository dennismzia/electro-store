<?php
    //include constants file to use constant variables like SITEURL
    include('config/constants.php');

    //include componets file to use card componets for products in the cart to display
    include('partials/componets.php');

    //include login check file to check if customer is login
    include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META CHARSET --> 
    <meta charset="UTF-8">
    <!-- META EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- META VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Electro Store - Shopping cart </title>
    <!-- META DESCRIPTION -->
    <meta name="description" content="Electro store is a shopping platform for the best and high quality of kitchen,office, 
    living room and other types of electronic for famous brands. We ensure satisfaction to our customer. We offer free 
    delivery on goods order amount above Ksh 500000 within Nairobi, Mombasa and Kisumu">
    <!-- META KEYWORDS -->
    <meta name="keywords" content="HP SAMSUNG SONY HISENSE DELL HUAWEII PHILLIPS RAMTONS ">
    <!-- META AUTHOR -->
    <meta name="author" content="Michael Mutisya">

    <!-- FAVICON-->
    <link  rel="shortcut icon" type="image/ico" href="images/favicon.ico">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CASCADING STYLE SHEET -->
    <link rel="stylesheet" href="css/style.css">

    <!-- JS SCRIPTS -->
    <script defer src="js/electrostoreapp.js"></script>
    
</head>
<body>
    <!--menu-section starts here-->
    <?php include('partials/header.php'); ?>
    <!--menu-section ends here-->

    <!--main-section starts here-->
    <main id="top-section" class="main-section wrapper">
        <section class="section-main">
            <div class="shopping-cart">
                <h3>Cart <i class="fa fa-shopping-cart"></i></h3>
                <hr>
            </div>
            <div class="cart">
                <div class="cart-row">
                    <?php
                        $total = 0;
                        if(isset($_SESSION['cart'])){
                            //set product id
                            $product_id = array_column($_SESSION['cart'], 'product_id');
                            
                            //SQL query to select product data
                            $sql = "SELECT * FROM `tbl_productS` WHERE `active`='Yes' AND `featured`='Yes'";

                            //execute the query
                            $res = mysqli_query($conn, $sql);

                            //display products on the cart
                            while($rows = mysqli_fetch_assoc($res)){
                                $product_name = $rows['product_name'];
                                $image_name = $rows['image_name'];
                                $product_price = $rows['price'];
                                $active = $rows['active'];
                                $featured = $rows['featured'];
                                
                                foreach($product_id as $id){
                                    if($rows['product_id'] == $id){
                                        cartProduct($image_name, $product_name, $product_price);
                                        $total = $total + (int)$rows['price'];
                                    }
                                }  
                            }
                        }
                        else{
                            echo "<div class='error text-center'>Cart is empty!</div>";
                        }                 
                    ?>
                </div>
                <div class="checkout">
                    <h5 class="text-center">Price details</h5>
                    <hr>
                    <?php
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<p class='text-center'>Items ($count)</p>";
                        }
                        else{
                            echo "<p class='text-center'>Items (0)</p>";
                        }
                    ?>
                    <div class="checkout-prices">
                        <h5 class="text-right">Ksh.<?php echo $total; ?></h5>
                        <h5>Price:</h5>
                        <?php
                            $vat = $total * 0.2;
                            echo "<h5 class='text-right error'>Ksh.$vat</h5>";
                        ?>
                        <h4>V.A.T: </h4>
                        <?php
                            
                            //check if total is over Ksh.500000 for free delivery
                            if($total >= 500000){
                                echo "<h5 class='text-right success'>FREE</h5>";
                            }
                            else{
                                $delivery_fee = 0.05 * $total;
                                echo "<h5 class='text-right error'>Ksh.$delivery_fee</h5>";
                            }
                        ?>
                        <h5>Delivery fee: </h5>
                        <?php
                            $total_amount = $total + $vat;
                            echo "<h5 class='text-right'>Ksh.$total_amount</h5>";
                        ?>
                        <h3>Total Amount: </h3>
                        <form action="checkout.php">
                            <button type="submit" class="btn primary">CHECKOUT</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main> 
    <!--main-section ends here-->

    <!--footer-section starts here-->
    <?php include('partials/footer.php'); ?>
    <!--footer-section ends here-->
</body>
<!-- Links for free icons from icons8 -->
<?php include('partials/freeiconslinks.php'); ?>
</html>