<?php
    session_start();
    include('config/db-conn.php');    
    include("functions/myfunctions.php");

    if(isset($_SESSION['auth_user']))
    {        
        $userid = $_SESSION['auth_user']['user_id'];              
    }
    else
    {
        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
        $userid = getenv("REMOTE_ADDR") ;                     
    }

    //Get orderID from URL
    if(isset($_GET['orderID']))
    {
        $orderID = $_GET['orderID'];
        
        $orderData = checkOrderID($orderID);
        if(mysqli_num_rows($orderData) < 0)
        {
            header("Location:index.php");
        }
        
    }

    $data = mysqli_fetch_array($orderData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon" />
    <title>IrokoLifestyle | Invoice</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="r_assets/css/vendors/font-awesome.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="r_assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="r_assets/css/style.css">

</head>

<body class="theme-color2 bg-light">

    <!-- invoice start -->
    <section class="theme-invoice-3 section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 m-auto">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <ul>
                                <li>
                                    <img src="r_assets/images/iroko.png" class="img-fluid" alt="logo">
                                </li>
                                <!-- <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h4>multikart demo store</h4>
                                </li> -->
                                <!-- <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <h4>emma@irokolifestyle.com</h4>
                                </li> -->
                            </ul>
                        </div>
                        <br>
                        <div class="invoice-footer pt-0">
                            <div class="row">
                                <div class="col-6">
                                   
                                </div>
                                <div class="col-6 text-end">
                                    <a href="index.php" class="btn btn-solid-default rounded-2">Back Home</a>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-body">
                            <div class="top-sec">
                                <div class="address-detail">
                                    <h2>invoice</h2>
                                    <div class="mt-3 row">
                                        <div class="col-lg-8 col-sm-6">
                                            <h4 class="mb-2"><?= $data['fname'];?> <?= $data['lname'];?></h4>
                                            <h4 class="mb-2"><?= $data['address'];?>, <?= $data['state'];?>, <?= $data['country'];?>, <?= $data['zip'];?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 mt-md-0 mt-2">
                                            <ul class="date-detail">
                                                <li><span>issue date :</span>
                                                    <h5> <?= $data['created_at'];?></h5>
                                                </li>
                                                <li><span>invoice no :</span>
                                                    <h4> <?= $data['payment_id'];?></h4>
                                                </li>
                                                <li><span>email :</span>
                                                    <h4> <?= $data['email'];?></h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>                                            
                                            <th scope="row">description</th>
                                            <th scope="col">qty</th>
                                            <th scope="col">price</th>
                                        </tr>
                                    </thead>                                    
                                            <tbody>
                                                    <?php                                                            
                                                        $order_query = "SELECT o.id as oid, o.payment_id, o.user_id, o.total_price, oi.*, p.* FROM orders o, order_items oi, 
                                                        products p WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.id='$orderID' ";

                                                        $order_query_run = mysqli_query($conn, $order_query);
                                                        if (mysqli_num_rows($order_query_run) > 0)
                                                        {
                                                            foreach ($order_query_run as $citem)
                                                            {
                                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $citem['name'];?></th>                                                        
                                                        <td><?= $citem['prod_qty'];?></td>
                                                        <td>&#8358;<?= number_format($citem['price']);?></td>                                                        
                                                    </tr>   
                                                    <?php
                                                            }
                                                        }
                                                    ?>                                                     
                                                </tbody>
                                                
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-bold text-dark" colspan="2">GRAND TOTAL</td>
                                            <td class="font-bold text-theme">&#8358;<?= number_format($data['total_price']);?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer pt-0">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-solid-default rounded-2" onclick="window.print();">export
                                        as PDF</a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="btn btn-solid-dark rounded-2" onclick="window.print();">print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- invoice end -->

</body>

</html>