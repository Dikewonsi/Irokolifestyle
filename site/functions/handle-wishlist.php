<?php
    session_start();    
	include("db-conn.php");

    if(isset($_SESSION['auth']))
    {
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

                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_exst_wish = "SELECT * FROM wishlist WHERE prod_id='$prod_id' AND user_id='$user_id' ";
                    $check_exst_wish_run = mysqli_query($conn, $check_exst_wish);

                    if(mysqli_num_rows($check_exst_wish_run) > 0)
                    {
                        echo 501;
                    }
                    else
                    {
                        $wishlist_query = "INSERT INTO wishlist (user_id, prod_id, price) VALUES('$user_id', '$prod_id', '$price')";
                        $wishlist_query_run = mysqli_query($conn, $wishlist_query);
    
                        if($wishlist_query_run)
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

                    $wid = $_POST['wid'];

                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_exst_wish = "SELECT * FROM wishlist WHERE id='$wid' AND user_id='$user_id' ";
                    $check_exst_wish_run = mysqli_query($conn, $check_exst_wish);

                    if(mysqli_num_rows($check_exst_wish_run) > 0)
                    {
                        $delete_query = "DELETE FROM wishlist WHERE id='$wid'";
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
                default:
                    echo 500;
            }
        }        
        
    }
    else
    {
        echo 401;
    }    
?>