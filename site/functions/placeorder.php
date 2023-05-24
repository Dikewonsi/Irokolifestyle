<?php
    session_start();
    include('db-conn.php');    
        
    if(isset($_POST['placeOrderBtn']))
    {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);
        $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);  
        
        $country = 'Nigeria';

        $payment_id = '1';

        $ship_status = 'In Processing';

        $track_no = 'IRLTID'.rand(999999, 111111);

        //Getting User ID
        if(isset($_SESSION['auth']))
        {
            $userId = $_SESSION['auth_user']['user_id'];
        }
        else
        {
            //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
            $userId = getenv("REMOTE_ADDR") ;                     
        }        
        //Getting Total Price
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, c.price, c.total_price, p.id as pid, p.name, p.image, p.price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
        $query_run = mysqli_query($conn, $query);            

        $total_price = 0;            

        foreach ($query_run as $citem)
        {
            $total_price += $citem['price'] * $citem['prod_qty'];
        }
        

        
        if($payment_method == 'paystack')
        {                            
            //Insert into orders table on DB

            $insert_order = "INSERT INTO orders (tracking_no, user_id, fname, lname, email, phone, address, state, country, zip, total_price, payment_method, payment_id, ship_status)
            VALUES('$track_no', '$userId', '$fname', '$lname', '$email', '$phone', '$address', '$address','$country', '$zip', '$total_price', '$payment_method', '$payment_id', '$ship_status')";

            $insert_order_run = mysqli_query($conn, $insert_order);

            if($insert_order_run)
            {
                //Insert into order items table on DB
                $order_id = mysqli_insert_id($conn); //Getting the order_id from orders table
                foreach ($query_run as $citem)
                {
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['price'];
                    $tprice = $citem['total_price'];

                    $insert_items_query = "INSERT INTO order_items (order_id, prod_id, prod_qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                    $insert_items_query_run = mysqli_query($conn, $insert_items_query);
                    
                    //Reduce quantity of products in DB
                    $product_query = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1 ";
                    $product_query_run = mysqli_query($conn, $product_query);

                    $productData = mysqli_fetch_array($product_query_run);
                    $current_qty = $productData['qty'];

                    $new_qty = $current_qty - $prod_qty;

                    $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
                    $updateQty_query_run = mysqli_query($conn, $updateQty_query);
                }
                $_SESSION['order_id'] = $order_id;
                header("Location: ../paystack-payment.php");
            }
        }
        else if($payment_method == 'credpal')
        {                
            //Insert into orders table on DB

            $insert_order = "INSERT INTO orders (tracking_no, user_id, fname, lname, email, phone, address, state, country, zip, total_price, payment_method, payment_id, ship_status)
            VALUES('$track_no', '$userId', '$fname', '$lname', '$email', '$phone', '$address', '$address','$country', '$zip', '$total_price', '$payment_method', '$payment_id', '$ship_status')";

            $insert_order_run = mysqli_query($conn, $insert_order);

            if($insert_order_run)
            {
                //Insert into order items table on DB
                $order_id = mysqli_insert_id($conn); //Getting the order_id from orders table
                foreach ($query_run as $citem)
                {
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['price'];
                    $tprice = $citem['total_price'];

                    $insert_items_query = "INSERT INTO order_items (order_id, prod_id, prod_qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                    $insert_items_query_run = mysqli_query($conn, $insert_items_query);

                }

                header("Location: credpal.php");
            }
        }
        else if($payment_method == 'wallet')
        {                
            //Insert into orders table on DB

            $insert_order = "INSERT INTO orders (tracking_no, user_id, fname, lname, email, phone, address, state, country, zip, total_price, payment_method, payment_id, ship_status)
            VALUES('$track_no', '$userId', '$fname', '$lname', '$email', '$phone', '$address', '$address','$country', '$zip', '$total_price', '$payment_method', '$payment_id', '$ship_status')";

            $insert_order_run = mysqli_query($conn, $insert_order);

            if($insert_order_run)
            {
                //Insert into order items table on DB
                $order_id = mysqli_insert_id($conn); //Getting the order_id from orders table
                foreach ($query_run as $citem)
                {
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['price'];
                    $tprice = $citem['total_price'];

                    $insert_items_query = "INSERT INTO order_items (order_id, prod_id, prod_qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                    $insert_items_query_run = mysqli_query($conn, $insert_items_query);

                }
                $_SESSION['order_id'] = $order_id;
                header("Location: ../wallet-checkout.php");
            }
        }
                                                    
    }
?>