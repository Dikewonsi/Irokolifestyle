<?php
    session_start();
    include('db-conn.php');

    if(!isset($_SESSION['auth_user']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
        header("Location: log-in.php");
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
        $amount = $result->data->amount / 100; //Because I multiplied the amount in top-up-checkout.php in js code.
        
        //User Details       

        $desc = 'top-up';

        $userid = $_SESSION['auth_user']['user_id'];    
        
        $track_no = 'IRLTID'.rand(999999, 111111);
        
        $topup_payment = "INSERT INTO wallet_transactions (user_id, amount, transaction_id, tracking_no, description) VALUES('$userid', '$amount', '$reference', '$track_no', '$desc')";
        $topup_payment_run = mysqli_query($conn, $topup_payment);

        

        if (!$topup_payment_run) {
        # code...
        echo "There was a problem in your code". mysqli_error($conn);
        }
        else
        {    
            
            header("location:../topup-success.php?status=success");
             exit;                    
        }        
    }
    else{
        header("Location: error.html");
        exit;
    }
?>