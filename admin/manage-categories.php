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
    <title>Electro Store - Admin control panel manage categories </title>
    <!-- META DESCRIPTION -->
    <meta name="description" content="Electro store is a shopping platform for the best and high quality of kitchen,office, 
    living room and other types of electronic for famous brands. We ensure satisfaction to our customer. We offer free 
    delivery on goods order amount above Ksh 500000 within Nairobi, Mombasa and Kisumu">
    <!-- META KEYWORDS -->
    <meta name="keywords" content="HP SAMSUNG SONY HISENSE DELL HUAWEII PHILLIPS RAMTONS ">
    <!-- META AUTHOR -->
    <meta name="author" content="Michael Mutisya">

    <!-- FAVICON-->
    <link  rel="shortcut icon" type="image/ico" href="../images/favicon.ico">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CASCADING STYLE SHEET -->
    <link rel="stylesheet" href="../css/admin.css">

    <!-- JS SCRIPTS -->
    <script defer src="../js/electrostoreapp.js"></script>
</head>
<body>
    <!--menu-section starts here section-->
    <?php include('partials/header.php'); ?>
    <!--menu-section ends here section-->

    <!--main-section starts here section-->
    <section class="main-section">
        <div class="wrapper">
            <div class="manage-tbl">
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn primary">Add Category</a>
                <br><br>
                <?php
                    //print add category session variables
                    if(isset($_SESSION['add-category'])){
                        echo $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    }
                    //print update category session variables
                    if(isset($_SESSION['update-category'])){
                        echo $_SESSION['update-category'];
                        unset($_SESSION['update-category']);
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['image-failed-remove'])){
                        echo $_SESSION['image-failed-remove'];
                        unset($_SESSION['image-failed-remove']);
                    }
                    //print delete category session variables
                    if(isset($_SESSION['delete-category'])){
                        echo $_SESSION['delete-category'];
                        unset($_SESSION['delete-category']);
                    }
                ?>
                <br>
                <table class="tbl-100 text-center">
                    <tr>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Active</th>
                        <th>Featured</th>
                        <th>Operations</th>
                    </tr>
                    <?php 
            
                        //SQL to read data from the database
                        $sql = "SELECT * FROM `tbl_categories` WHERE 1 ";

                        //Execute the query
                        $res = mysqli_query($conn, $sql);

                        //count row to check if there is any data in the database table
                        $count = mysqli_num_rows($res);

                        //initializing serial number for category 
                        $sn = 1;

                        //test if the count has rows or not
                        if($count > 0){
                            //there is data in the table
                            //loop in the rows to get all data
                            while($row = mysqli_fetch_assoc($res)){
                                $category_id = $row['category_id'];
                                $category_name = $row['category_name'];
                                $image_name = $row['image_name'];
                                $active = $row['active'];
                                $featured = $row['featured'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $category_name; ?></td>
                                    <?php
                                        //check if the image field is empty or not
                                        if($image_name ==""){
                                            //print error message
                                            ?>
                                            <td>
                                                <?php echo "<p class='error'>Image not found</p>"?>
                                            </td>
                                            <?php
                                        }
                                        else{
                                            //display the image 
                                            ?>
                                            <td>
                                                <img src="<?php echo SITEURL."images/categories/".$image_name; ?>" style="width: 80px; height: 60px;">
                                            </td>
                                            <?php
                                        }
                                    ?>
                                    <td><?php echo $active; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?category_id=<?php echo $category_id; ?>" class="btn secondary">Update</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category.php?category_id=<?php echo $category_id; ?>" class="btn danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            //there is no data in the table
                            echo "<div class='error text-center'>Categories table is empty!</div>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <!--main-section ends here section-->
    
    <!--footer-section starts here section-->
    <?php include('partials/footer.php'); ?>
    <!--footer-section ends here section-->
</body>
</html>