<?php
    //category card component
    function categoryCard($title, $image_name, $category_id){
        $element = "
        <a href=\"category-items.php?category_id=$category_id\">
            <div class=\"card\">
                <h3>$title</h3>
                <img src=\"images/categories/$image_name\" alt=\"Category image\" title=\"$title\" class=\"img-responsive\">
            </div>
        </a>
        ";
        echo $element;
    }

    //product card component
    //check if add to chart is click
    if(isset($_POST['add'])){
        //check if cart session variable is set
        if(isset($_SESSION['cart'])){

            $product_array_id = array_column($_SESSION['cart'], "product_id");
            
            //check if product is available on the cart with id
            if(in_array($_POST['product_id'], $product_array_id)){
                echo "<script>alert('Already the product is in the cart!')</script>";
                echo "<script>window.location='products.php'</script>";
            }
            else{
                $count = count($_SESSION['cart']);
                $product_array = array('product_id'=>$_POST['product_id']);

                $_SESSION['cart'][$count] = $product_array;

            }
        }
        else{
            $product_array = array('product_id'=>$_POST['product_id']);

            //set new session variable
            $_SESSION['cart'][0] = $product_array;
        }
    }
    function productCard($image_name, $product_name, $short_description, $old_price, $new_price, $product_id){
        $element= "
        <div class=\"product-card\">
            <a href=\"product-description.php?product_id='$product_id'\" type=\"submit\">
                <form action=\"\" method=\"POST\">
                    <div class=\"product-card-img\">
                            <img src=\"images/products/$image_name\" alt=\"product image\" class=\"img-responsive\" style=\"height: 21vh;\">
                    </div>
                    <div>
                        <h4>$product_name</h4>
                    </div>
                    <div>
                        <p>$short_description</p>
                    </div>
                    <div class=\"rating\">
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-regular fa-star\"></i>
                    </div>
                    <div>
                        <small><s>Ksh. $old_price</s></small>
                        <h4>Ksh. $new_price</h4>
                    </div>
                    <input type=\"hidden\" name=\"product_id\" value=\"$product_id\">
                    <div class=\".purchase\">
                        <button type=\"submit\" class=\"add img-responsive\" name=\"add\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                        <button type=\"submit\" class=\"add img-responsive button-active\" name=\"add\">Remove <i class=\"fa fa-bin\"></i></button>
                    </div>
                </form>
        
            </a>
        </div>
        ";
        echo $element;
    }

    //product description card componet
    function productDescriptionCard($image_name, $product_name, $short_description, $long_description, $old_price, $new_price){
        $element = "
        <div class=\"product-description\">
                <div class=\"gallery-description\">
                    <div class=\"product-image-description\">
                        <img src=\"images/products/$image_name\" class=\"img-responsive\">
                    </div>
                    <div class=\"change-image\">
                        <div><img src=\"images/products/$image_name\" class=\"img-responsive\"></img></div>
                        <div><img src=\"images/products/$image_name\" class=\"img-responsive\"></img></div>
                        <div><img src=\"images/products/$image_name\" class=\"img-responsive\"></img></div>
                        <div><img src=\"images/products/$image_name\" class=\"img-responsive\"></img></div>
                    </div>
                </div>
                <div class=\"short-description\">
                    <h3>$product_name</h3>
                    <div class=\"rating\">
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-regular fa-star\"></i>
                    </div>
                    <p>$short_description</p>
                    <h3><small><s>$old_price</s></small></h3>
                    <h3>$new_price</h3>
                    <form action=\"index.php\">
                        <button type=\"submit\" class=\"primary img-responsive\" name=\"add\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                    </form>
                </div>
            </div>
            <div class=\"long-description\">
                <h4 class=\"text-center\">More description</h4>
                <p>$long_description</p>
            </div>
        ";
        echo $element;
    }
    //cart product card
    function cartProduct($image_name, $product_name, $product_price){
        $element  = "
        <div class=\"product\">
            <div class=\"cart-product-card\">
                <div class=\"product-img\">
                    <img src=\"images/products/$image_name\" title=\"product image\" class=\"img-responsive\">
                </div>
                <div class=\"product-description\">
                    <h4>$product_name</h4>
                    <div class=\"rating\" style=\"font-size:9px;\">
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-solid fa-star\"></i>
                        <i class=\"fa-regular fa-star\"></i>
                    </div>
                    <h4>$product_price</h4>
                    <button type=\"submit\" class=\"btn danger\">REMOVE</button>
                </div>
            </div>
            <div class=\"quantity text-center\">
                <h4>Quantity</h4>
                <div class=\"quantity-input\">
                    <button class=\"btn danger\"><i class=\"fas fa-minus\"></i></button>
                    <input type=\"number\" value=\"1\" class=\"qnum\">
                    <button class=\"btn primary\"><i class=\"fas fa-plus\"></i></button>
                </div>
            </div>
        </div>
        ";
        echo $element;
    }