<?php
    session_start();
    include('db-conn.php');

    if(isset($_SESSION['auth']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
    }
    else
    {
        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
        $userid = getenv("REMOTE_ADDR") ;                     
    }
 

	$ref = $_GET['reference'];
	if ($ref == "") {
		// code...
		header("Location:javascript://history.go(-1)");
	}

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" .rawurlencode($ref),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_93efaf3397ab09be5b4a77da3df96bf6e4c2f7c8",
        "Cache-Control: no-cache",
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err)
    {
        echo "cURL Error #:" . $err;
    } else
    {
        //echo $response;
        $result = json_decode($response);
    }

    if ($result->data->status == 'success')
    {
        $reference = $result->data->reference;
        // User Details       

        $order_id = $_SESSION['order_id'];        
        
        $update_payment = "UPDATE orders SET payment_id='$reference', payment_status=1 WHERE id='$order_id' ";
        $update_payment_run = mysqli_query($conn, $update_payment);

        

        if (!$update_payment_run) {
        # code...
        echo "There was a problem in your code". mysqli_error($conn);
        }
        else
        {    

        $deleteCartQuery = "DELETE FROM carts WHERE user_id = $userid ";
        $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);

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
    else{
        header("Location: error.html");
        exit;
    }
?>