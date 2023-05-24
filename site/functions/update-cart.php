<?php 

    // mobile view update cart function


    session_start();    
	include("db-conn.php");

        if(isset($_GET['update_qty'])){
            $prod_id = $_GET['prod_id'];
            $qty = $_GET['qty'];
            $price = $_GET['price'];

            $tprice = $qty*$price;


            if(is_numeric($qty) && $qty > 0){
                $cart_query = "UPDATE carts set prod_qty=$qty, total_price=$tprice WHERE prod_id=$prod_id  ";
                $cart_query_run = mysqli_query($conn, $cart_query);

                if($cart_query_run){
                    header("Location: ../cart.php");
                }
            }
        }    
?>