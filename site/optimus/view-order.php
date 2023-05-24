<?php
    session_start();
    include ("../config/db-conn.php");
    include("../functions/myfunctions.php");

    if(isset($_GET['payID']))
    {
        $payment_id = $_GET['payID'];
        
        $orderData = checkPaymentId($payment_id);
        if(mysqli_num_rows($orderData) < 0)
        {
            header("Location:index.php");
        }
        
    }
    else
    {
        header("Location:index.php");
    }    
       
    $data = mysqli_fetch_array($orderData);
                
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>IrokoLifestyle - Order Details</title> 

    <?php include('header.php');?>
            <!-- Page Sidebar Ends-->

            <!-- tracking section start -->
            <?php
                $payment_id = $_GET['payID'];
                
                $orderData = checkPaymentId($payment_id);
                if(mysqli_num_rows($orderData) > 0)
                {
                    $data = mysqli_fetch_array($orderData);
                }
            ?>
            <div class="page-body">                
                <div class="title-header title-header-block package-card">
                    <div>
                        <h5>Order <?= $data['payment_id'];?></h5>
                    </div>
                    <div class="card-order-section">
                        <ul>
                            <li>Purchased By: <?= $data['fname'].' '.$data['lname'];?></li>                            
                        </ul>
                    </div>
                </div>

                <!-- tracking table start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="bg-inner cart-section order-details-table">
                                        <div class="row g-4">
                                            <div class="col-xl-8">
                                                <div class="table-responsive table-details">
                                                    <table class="table cart-table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">Order Details</th>  
                                                                <th class="text-end" colspan="2">
                                                                    <a href="edit-order-status.php?payID=<?= $payment_id ?>"
                                                                        class="theme-color">Edit
                                                                        Shipment Status</a>
                                                                </th>                                                              
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php                                                            
                                                            $order_query = "SELECT o.id as oid, o.payment_id, o.user_id, o.total_price, oi.*, p.* FROM orders o, order_items oi, 
                                                            products p WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.payment_id='$payment_id' ";

                                                            $order_query_run = mysqli_query($conn, $order_query);
                                                            if (mysqli_num_rows($order_query_run) > 0)
                                                            {
                                                                foreach ($order_query_run as $citem)
                                                                {
                                                                ?>
                                                            <tr class="table-order">
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="../uploads/<?= $citem['image'];?>"
                                                                            class="img-fluid blur-up lazyload" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <p>Product Name</p>
                                                                    <h5><?= $citem['name'];?></h5>
                                                                </td>
                                                                <td>
                                                                    <p>Quantity</p>
                                                                    <h5><?= $citem['prod_qty'];?></h5>
                                                                </td>
                                                                <td>
                                                                    <p>Price</p>
                                                                    <h5>&#8358;<?= number_format($citem['price']);?></h5>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                            }
                                                        ?>

                                                        </tbody>

                                                        <tfoot>
                                                            <tr class="table-order"> 
                                                                <td colspan="3">
                                                                    <h5>Subtotal :</h5>
                                                                </td>
                                                                <td>
                                                                    <h4>&#8358;<?= number_format($citem['total_price']);?></h4>
                                                                </td>
                                                            </tr>

                                                            <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h5>Shipping :</h5>
                                                                </td>
                                                                <td>
                                                                    <h4>&#8358;10,000</h4>
                                                                </td>
                                                            </tr>

                                                            <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h4 class="theme-color fw-bold">Total Price :</h4>
                                                                </td>
                                                                <td>
                                                                    <h4 class="theme-color fw-bold"><h4>&#8358;<?= number_format($citem['total_price']);?></h4></h4>
                                                                </td>
                                                            </tr>
                                                        </tfoot>                                                        
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="order-success">
                                                    <div class="row g-4">
                                                        <h4>summary</h4>
                                                        <ul class="order-details">
                                                            <li>Order ID: <?= $data['payment_id'];?></li>
                                                            <li>Order Date: <?= $data['created_at'];?></li>
                                                            <li>Order Total: &#8358;<?= number_format($data['total_price']);?></li>
                                                        </ul>

                                                        <h4>shipping address</h4>
                                                        <ul class="order-details">
                                                            <li><?= $data['address'];?></li>
                                                            <li><?= $data['state'];?></li>
                                                            <li><?= $data['country'];?></li>
                                                            <li><?= $data['zip'];?></li>
                                                        </ul>

                                                        <div class="payment-mode">
                                                            <h4>payment method</h4>
                                                            <p><?= $data['payment_method'];?></p>
                                                        </div>
                                                        
                                                        <div class="payment-mode">
                                                            <h4>Shipment Status</h4>
                                                            <p><?= $data['ship_status'];?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                
                                    </div>
                                    <!-- section end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tracking table end -->
               
            </div>
            <!-- tracking section End -->
        </div>
    </div>
    <!-- page-wrapper End -->

    <?php include('footer.php');?>
</body>

</html>