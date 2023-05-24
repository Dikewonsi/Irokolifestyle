<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');

    if(isset($_SESSION['auth_user']))
    {        
        if(isset($_GET['payID']))
        {
            $payment_id = $_GET['payID'];

            $orderData = checkPaymentId($payment_id);
            if(mysqli_num_rows($orderData) < 0)
            {
                
            }
        }        
    }    
    else
    {
        header("Location: log-in.php");
    }

    $data = mysqli_fetch_array($orderData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="manifest" href="./manifest.json" />
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.jpg" />
    <meta name="theme-color" content="#977767" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Voxo" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.jpg" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon" />
    <title>View Order</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo4_dark.css">

</head>

<body class="dark">

    <!-- header start -->
        <?php include('includes/header.php');?>
    <!-- header end -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="index.php">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="toggle-category">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="cart.php">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="wishlist.php">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="user-dashboard.php">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Oder Details Section Start -->
    <section class="section-b-space cart-section order-details-table">
        <div class="container">           
            <div class="title title1 title-effect mb-1 title-left">
                <h2 class="mb-3">Order Details</h2>
                <?php
                    $orderData = checkPaymentId($payment_id);
                    if(mysqli_num_rows($orderData) > 0)
                    {
                        $data = mysqli_fetch_array($orderData);
                    }
                ?>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="col-sm-12 table-responsive">
                        <table class="table cart-table table-borderless">
                            <tbody>
                                <?php
                                    $userid = $_SESSION['auth_user']['user_id'];
                                    $order_query = "SELECT o.id as oid, o.payment_id, o.user_id, o.total_price, oi.*, p.* FROM orders o, order_items oi, 
                                    products p WHERE o.user_id='$userid' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.payment_id='$payment_id' ";

                                    $order_query_run = mysqli_query($conn, $order_query);
                                    if (mysqli_num_rows($order_query_run) > 0)
                                    {
                                        foreach ($order_query_run as $citem)
                                        {
                                        ?>
                                            <tr class="table-order">
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <img src="uploads/<?= $citem['image'];?>"
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
                                        <h5 class="font-light">Subtotal :</h5>
                                    </td>
                                    <td>
                                        <h4>&#8358;<?= number_format($citem['total_price']);?></h4>
                                    </td>
                                </tr>

                                <tr class="table-order">
                                    <td colspan="3">
                                        <h5 class="font-light">Shipping :</h5>
                                    </td>
                                    <td>
                                        <h4>&#8358;<?= number_format(10000);?></h4>
                                    </td>
                                </tr>

                                <tr class="table-order">
                                    <td colspan="3">
                                        <h4 class="theme-color fw-bold">Total Price :</h4>
                                    </td>
                                    <td>
                                        <h4 class="theme-color fw-bold">&#8358;                                            
                                            <?= number_format($citem['total_price']);?>                                            
                                        </h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order-success">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <h4>Summary</h4>
                                <ul class="order-details">
                                    <li>Order ID: <?= $data['payment_id'];?></li>
                                    <li>Order Date: <?= $data['created_at'];?></li>
                                    <li>Order Total: &#8358;<?= number_format($data['total_price']);?></li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <h4>shipping address</h4>
                                <ul class="order-details">
                                    <li><?= $data['address'];?></li>
                                    <li><?= $data['state'];?></li>
                                    <li><?= $data['phone'];?></li>
                                    <li><?= $data['country'];?></li>
                                </ul>
                            </div>

                            <div class="col-12">
                                <div class="payment-mode">
                                    <h4>payment method</h4>
                                    <p><?= $data['payment_method'];?></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="delivery-sec">
                                    <h3>expected date of delivery: <span>october 22, 2018</span></h3>
                                    <a href="order-tracking.html">track order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Section End -->

     <!-- Subscribe Section Start -->
     <section class="subscribe-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="subscribe-details">
                        <h2 class="mb-3">Sign up to our Newsletter!</h2>
                        <h6 class="font-light">Never miss any new updates or products we reveal, stay up to date.</h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                    <div class="subsribe-input">
                        <div class="input-group">
                            <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                            <button class="btn btn-solid-default" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->

    <!-- footer start -->
        <?php include('includes/footer.php'); ?>
    <!-- footer end -->

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>