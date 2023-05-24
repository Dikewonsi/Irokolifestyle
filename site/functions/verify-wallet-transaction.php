<?php
    session_start();
    include('db-conn.php');

    if(!isset($_SESSION['auth_user']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
        header("Location: log-in.php");
    }

    if(isset($_POST['walletPayBtn']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
        $amount = $_POST['amount'];
        $order_id = $_SESSION['order_id'];        
        
        $reference = 'IRWP'.rand(99999999, 11111111);

        $update_payment = "UPDATE orders SET payment_id='$reference', payment_status=1 WHERE id='$order_id' ";
        $update_payment_run = mysqli_query($conn, $update_payment);

        if (!$update_payment_run)
        {
            # code...
            echo "There was a problem in your code". mysqli_error($conn);
        }
        else
        {
            //Delete From Carts, so that carts is empty.
            $deleteCartQuery = "DELETE FROM carts WHERE user_id =1 ";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);

            //Insert iNTO WALLETS
            $desc = 'order';

            $track_no = 'IRLTID'.rand(999999, 111111);

            $updateWallet = "INSERT INTO wallet_transactions (user_id, amount, transaction_id, description, tracking_no) VALUES('$userid', '$amount', '$reference', '$desc', '$track_no')";
            $updateWallet_run = mysqli_query($conn, $updateWallet);
    
            if($deleteCartQuery_run)
            {
                header("location:../order-success.php?status=success");
                    exit;
            }
            else
            {
                echo "something went wrong";
            }
            
            
        }

                
       
    }
    else
    {
        echo 500;
    }
?>