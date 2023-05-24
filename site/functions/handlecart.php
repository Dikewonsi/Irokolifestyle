<?php
    session_start();    
	include("db-conn.php");

    
        if(isset($_POST['scope']))
        {
            $scope = $_POST['scope'];
            switch ($scope)
            {
                case "add":
                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];
                    $price = $_POST['price'];

                    $tprice = $prod_qty*$price;

                    if(isset($_SESSION['auth']))
                    {
                        $user_id = $_SESSION['auth_user']['user_id'];
                    }
                    else
                    {
                        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                        $user_id = getenv("REMOTE_ADDR") ;                     
                    }                    

                    $check_exst_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
                    $check_exst_cart_run = mysqli_query($conn, $check_exst_cart);

                    if(mysqli_num_rows($check_exst_cart_run) > 0)
                    {
                        echo 500;
                    }
                    else
                    {
                        $cart_query = "INSERT INTO carts (user_id, prod_id, prod_qty, price, total_price) VALUES('$user_id', '$prod_id', '$prod_qty', '$price', '$tprice')";
                        $cart_query_run = mysqli_query($conn, $cart_query);
    
                        if($cart_query_run)
                        {
                            echo 201;
                        }
                        else
                        {
                            echo 500;
                        }
                    }

                    break;    
                    
                case "delete":

                    $cid = $_POST['cid'];

                    if(isset($_SESSION['auth']))
                    {
                        $user_id = $_SESSION['auth_user']['user_id'];
                    }
                    else
                    {
                        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                        $user_id = getenv("REMOTE_ADDR") ;                     
                    }

                    $check_exst_cart = "SELECT * FROM carts WHERE id='$cid' AND user_id='$user_id' ";
                    $check_exst_cart_run = mysqli_query($conn, $check_exst_cart);

                    if(mysqli_num_rows($check_exst_cart_run) > 0)
                    {
                        $delete_query = "DELETE FROM carts WHERE id='$cid'";
                        $delete_query_run = mysqli_query($conn, $delete_query);
    
                        if($delete_query_run)
                        {
                            echo 200;
                        }
                        else
                        {
                            echo 500;
                        }
                    }
                    else
                    {
                       
                    }
                    break;                

                case "deleteAll":

                    if(isset($_SESSION['auth']))
                    {
                        $user_id = $_SESSION['auth_user']['user_id'];
                    }
                    else
                    {
                        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                        $user_id = getenv("REMOTE_ADDR") ;                     
                    }                    
                    
                    $delete_all_query = "DELETE FROM carts WHERE user_id = '$user_id' ";
                    $delete_all_query_run = mysqli_query($conn, $delete_all_query);

                    if($delete_all_query_run)
                    {
                        echo 200;
                    }
                    else
                    {
                        echo 500;
                    }                    
                    break;

                default:
                    echo 500;
            }
        }    


    
?>