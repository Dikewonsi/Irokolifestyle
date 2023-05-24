<?php 
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors',TRUE);
    include("db-conn.php");

    if(isset($_SESSION['auth']))
    {
        if(($_POST['prod_qty'] > 0)){

            $prod_qty = 2;
            $prod_id = 27;
            $price = 13000; 
            

            $tprice = $prod_qty*$price;

            $update_cart_query=" UPDATE carts SET prod_qty='$prod_qty', total_price='$tprice' WHERE prod_id ='$prod_id'  ";

            $update_cart_query_run = mysqli_query($conn, $update_cart_query);

            if($update_cart_query_run)
            {
                echo 201;            
            }
            else
            {                
                header("Location: index.php");
            }
        }
    }
?>