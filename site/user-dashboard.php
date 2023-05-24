<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');

    if(isset($_SESSION['auth']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
    }
    else
    {
        //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
        $userid = getenv("REMOTE_ADDR") ;                     
    }
    
    //Fetch All Credit
        $credit_balance=0;
        $sql="SELECT  sum(amount) as credit_balance  FROM wallet_transactions where description ='top-up' and user_id='$userid'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        
        
        $credit_balance= $row['credit_balance'];
        
        }
    
    //Fetch All Debit
        $debit_balance=0;
        $sql="SELECT  sum(amount) as debit_balance  FROM wallet_transactions where description ='order' and user_id='$userid'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        
        
        $debit_balance= $row['debit_balance'];
        
        }
        
        $total_balance = $credit_balance - $debit_balance;                                                                                                    
                                                    
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
    <title>DashBoard</title>

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

    <!-- AlertifyJS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>

<body class="dark">

    <!-- header start -->
    <?php include('includes/header.php'); ?>
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
                <a href="user-dashboard.php" class="active">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>User Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab"
                                data-bs-target="#dash" type="button"><i
                                    class="fas fa-angle-right"></i>Dashboard</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order"
                                type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab"
                                data-bs-target="#wishlist" type="button"><i
                                    class="fas fa-angle-right"></i>Wishlist</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab"
                                data-bs-target="#wallet" type="button"><i
                                    class="fas fa-angle-right"></i>Wallet</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="5-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button"><i
                                    class="fas fa-angle-right"></i>Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab"
                                data-bs-target="#security" type="button"><i
                                    class="fas fa-angle-right"></i>Security</button>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dash">
                            <div class="dashboard-right">
                                <div class="dashboard">
                                    <?php
                                        //Catch All User Details
                                        $profile_query = "SELECT * FROM users WHERE id='$userid' ";
                                        $profile_query_run = mysqli_query($conn, $profile_query);
                                        $row=mysqli_fetch_array($profile_query_run);                                            
                                    ?>
                                    <div class="page-title title title1 title-effect">
                                        <h2>My Dashboard</h2>
                                    </div>
                                    <div class="welcome-msg">
                                        <h6 class="font-light">Hello, <span><?= $row['fullname'];?> !</span></h6>
                                        <p class="font-light">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity, orders, and update your account
                                            information. Select a menu above to view options.</p>
                                    </div>

                                    <div class="order-box-contain my-4">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/box.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/box1.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">total orders</h5>
                                                            <?php
                                                                $sql = "SELECT count('userid') FROM orders WHERE user_id='$userid'";
                                                                $result = $conn->query($sql);
                                                                $rows=mysqli_fetch_array($result);
                                                            ?>
                                                            <h3>
                                                                <?php
                                                                    $od_qty = $rows[0];

                                                                    if($od_qty > 0)
                                                                    {
                                                                        echo $od_qty;
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 0;
                                                                    }
                                                                ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/wallet.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/wallet1.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">Wallet</h5>
                                                            <h3>&#8358;<?= number_format($total_balance);?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/wishlist.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/wishlist1.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <?php
                                                                $userid = $_SESSION['auth_user']['user_id'];

                                                                $sql = "SELECT count('id') FROM wishlist WHERE user_id='$userid'";
                                                                $result = $conn->query($sql);
                                                                $wish=mysqli_fetch_array($result);
                                                                                                                                
                                                            ?>
                                                            <h5 class="font-light">wishlist</h5>
                                                            <h3>
                                                                <?php
                                                                    $wish_qty = $wish[0];

                                                                    if($wish_qty > 0)
                                                                    {
                                                                        echo $wish_qty;
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 0;
                                                                    }
                                                                ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-account box-info">
                                        <div class="box-head">
                                            <h3>Account Information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="box">
                                                    <div class="box-title">
                                                        <h4>Contact Information</h4><a
                                                            href="javascript:void(0)">Edit</a>
                                                    </div>
                                                    <div class="box-content">
                                                        <h6 class="font-light"><?= $row['fullname']; ?></h6>
                                                        <h6 class="font-light"><?= $row['email']; ?></h6>
                                                        <a href="javascript:void(0)">Change Password</a>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div>
                                            <div class="box address-box">
                                                <div class="box-title">
                                                    <h4>Address Book</h4><a href="javascript:void(0)">Manage
                                                        Addresses</a>
                                                </div>
                                                <div class="box-content">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6">
                                                            <h6 class="font-light">Default Billing Address</h6>
                                                            <h6 class="font-light">You have not set a default
                                                                billing address.</h6>
                                                            <a href="javascript:void(0)">Edit Address</a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h6 class="font-light">Default Shipping Address</h6>
                                                            <h6 class="font-light">You have not set a default
                                                                shipping address.</h6>
                                                            <a href="javascript:void(0)">Edit Address</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                            <div class="box-head mb-3">
                                <h3>My Order</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">                                            
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">View</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $orders = getOrders();
                                            if(mysqli_num_rows($orders) > 0)
                                            {
                                                foreach($orders as $data)
                                                {

                                                
                                        ?>
                                        <tr>
                                            <td>
                                                <p class="mt-0"><?= $data['payment_id'];?></p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0"><?= $data['payment_method'];?></p>
                                            </td>
                                            <td>
                                                <p class="success-button btn btn-sm">Paid</p>
                                            </td>
                                            <td>
                                                <p class="theme-color fs-6">&#8358;<?= number_format($data['total_price']);?></p>
                                            </td>
                                            <td>
                                                <a href="view-order.php?payID=<?= $data['payment_id'];?>">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>  
                                        <?php 
                                                }
                                            }
                                        ?>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wishlist">
                            <?php 
                                $items = getWishlist(); 

                                if(mysqli_num_rows($items) > 0)
                                {
                            ?>
                            <div class="box-head mb-3">
                                <h3>My Wishlist</h3>
                            </div>
                            <div class="table-responsive" id="mywish">
                                <table class="table cart-table wishlist-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">image</th>
                                            <th scope="col">Product Details</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <?php 
                                            $items = getWishlist(); 
                                            foreach ($items as $citem)
                                            {
                                                
                                            ?>
                                    <tbody>
                                        <tr class="product_data">
                                            <td>
                                                <a href="product-left-sidebar.html">
                                                    <img src="uploads/<?= $citem['image'];?>" class=" blur-up lazyload"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="product-left-sidebar.html" class="font-light"><?= $citem['name'];?></a>
                                                <div class="mobile-cart-content row">
                                                    <div class="col">
                                                        <p>In Stock</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="fw-bold">&#8358;<?= number_format($citem['price']);?></p>
                                                    </div>
                                                    <div class="col">
                                                        <h2 class="td-color">
                                                        <button type="button" class="deleteWish" value="<?= $citem['wid'];?>">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                        </h2>
                                                        <h2 class="td-color">
                                                            <input type="hidden" class="cost" value="<?= $citem['price'];?>">
                                                            <button type="button" class="addToCartBtn2" value="<?= $citem['prod_id'];?>">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-bold">&#8358;<?= number_format($citem['price']);?></p>                                            
                                            </td>
                                            <td>
                                                <p>In Stock</p>
                                            </td>
                                            <td>
                                                <button type="button" class="deleteWish" value="<?= $citem['wid'];?>">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input type="hidden" class="cost" value="<?= $citem['price'];?>">
                                                <button type="button" class="addToCartBtn2" value="<?= $citem['prod_id'];?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                            <?php
                                            }
                                            ?>
                                </table>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="success-icon">
                                            <div class="main-container">
                                                <div class="check-container">
                                                    <div class="check-background" style="color:brown">
                                                        <img src="assets/images/wishlist.png" width="50px;" height="50px;" alt="">
                                                    </div>
                                                    <div class="check-shadow"></div>
                                                </div>
                                            </div>

                                            <div class="success-contain">
                                                <h4 style="color:#977767;">Your wishlist is empty</h4>          
                                                <hr>                          
                                                <a href="index.php" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                        
                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wallet">
                            <?php 
                                $items = getWallet(); 

                                if(mysqli_num_rows($items) > 0)
                                {
                            ?>
                            <div class="box-head mb-3">
                                <h3>Transactions</h3>
                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addPayment"><i class="fas fa-plus"></i>
                                    Top Up</button>
                            </div>
                            <div class="order-box-contain my-4">
                                <div class="row g-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="order-box">
                                            <div class="order-box-image">
                                                <img src="assets/images/svg/wallet.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                            <div class="order-box-contain">
                                                <img src="assets/images/svg/wallet1.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <div>
                                                    <h5 class="font-light">Current Balance</h5>                                                    
                                                    <h3>                                                        
                                                        &#8358;<?= number_format($total_balance);?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="mywish">
                            <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">Tracking No</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Transaction Id</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Tran Type</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                            $items = getWallet(); 
                                            foreach ($items as $citem)
                                            {
                                                
                                            ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="mt-0"><?= $citem['tracking_no']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mt-0"> &#8358;<?= number_format($citem['amount']); ?></p>
                                            </td>
                                            <td>
                                                <p class="mt-0"><?= $citem['transaction_id']; ?></p>
                                            </td>
                                            <td>
                                                <p class="mt-0"><?= $citem['description']; ?></p>
                                            </td>
                                            <td>
                                                <?php 
                                                    $desc = $citem['description'];

                                                    if($desc == 'top-up')
                                                    {
                                                        echo '<p class="success-button btn btn-sm">Credit</p>';
                                                    }
                                                    else if($desc == 'order')
                                                    {
                                                        echo '<p class="danger-button btn btn-sm">Debit</p>';
                                                    }
                                                ?>                                                
                                            </td>
                                            <td>
                                                <p class="mt-0"><?= $citem['created_at']; ?></p>
                                            </td>                                           
                                        </tr>
                                    </tbody>
                                            <?php
                                            }
                                            ?>
                                </table>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="success-icon">
                                            <div class="main-container">
                                                <div class="check-container">
                                                    <div class="check-background" style="color:brown">
                                                        <img src="assets/images/digital-wallet.png" width="50px;" height="50px;" alt="">
                                                    </div>
                                                    <div class="check-shadow"></div>
                                                </div>
                                            </div>

                                            <div class="success-contain">
                                                <h4 style="color:#977767;">There is nothing in your wallet history</h4>          
                                                <hr>                          
                                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                                                data-bs-target="#addPayment"><i class="fas fa-plus"></i>
                                                Top Up</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>                    
                        
                        <div class="tab-pane fade dashboard-profile dashboard" id="profile">
                            <?php
                                //Catch All User Details
                                $profile_query = "SELECT * FROM users WHERE id='$userid' ";
                                $profile_query_run = mysqli_query($conn, $profile_query);
                                $row=mysqli_fetch_array($profile_query_run);                                            
                            ?>
                            <div class="box-head">
                                <h3>Profile</h3>
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#resetEmail">Edit</a>
                            </div>
                            <ul class="dash-profile">
                                <li>
                                    <div class="left">
                                        <h6 class="font-light">Full Name</h6>
                                    </div>
                                    <div class="right">
                                        <h6><?= $row['fullname']?></h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="left">
                                        <h6 class="font-light">Email Address</h6>
                                    </div>
                                    <div class="right">
                                    <h6><?= $row['email']?></h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="left">
                                        <h6 class="font-light">Phone Number</h6>
                                    </div>
                                    <div class="right">
                                    <h6><?= $row['phone']?></h6>
                                    </div>
                                </li>                                
                            </ul>

                            <div class="box-head mt-lg-5 mt-3">
                                <h3>Login Details</h3>
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#resetEmail">Edit</a>
                            </div>

                            <ul class="dash-profile">
                                <li>
                                    <div class="left">
                                        <h6 class="font-light">Email Address</h6>
                                    </div>
                                    <div class="right">
                                    <h6><?= $row['email']?></h6>
                                    </div>                                    
                                </li>                                

                                <li class="mb-0">
                                    <div class="left">
                                        <h6 class="font-light">Password</h6>
                                    </div>
                                    <div class="right">
                                        <h6>●●●●●●</h6>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade dashboard-security dashboard" id="security">
                            <div class="box-head">
                                <h3>Delete Your Account</h3>
                            </div>
                            <div class="security-details">
                                <h5 class="font-light mt-3">Hi <span> Mark Enderess,</span>
                                </h5>
                                <p class="font-light mt-1">We Are Sorry To Here You Would Like To Delete Your Account.
                                </p>
                            </div>

                            <div class="security-details-1 mb-0">
                                <div class="page-title">
                                    <h4 class="fw-bold">Note</h4>
                                </div>
                                <p class="font-light">Deleting your account will permanently remove your profile,
                                    personal settings, and all other associated information. Once your account is
                                    deleted, You will be logged out and will be unable to log back in.</p>

                                <p class="font-light mb-4">If you understand and agree to the above statement, and would
                                    still like to delete your account, than click below</p>

                                <button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete Your
                                    Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->

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
    <?php include('includes/footer.php');?>
    <!-- footer end -->   

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

    <!-- Add Payment Modal Start -->
    <div class="modal fade payment-modal" id="addPayment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style=background:#2b2b2b;>
                    <form method="post" action="top-up-checkout.php">
                        <div class="mb-4">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
                        </div>                        
                </div>                
                        <div class="modal-footer pt-0 text-end d-block" style="background:#2b2b2b;">
                            <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="topupBtn" class="btn btn-solid-default rounded-1">Continue</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Add Payment Modal End -->

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

    <!-- Filter Hide and show Js -->
    <script src="assets/js/filter.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/custom.js"></script>

    <!-- AlertJS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        alertify.set('notifier','position', 'top-right');
        <?php
            if (isset($_SESSION['message']))
            {
                ?>        
                alertify.success('<?php echo $_SESSION['message']; ?>');
            <?php
                unset($_SESSION['message']);
                exit();
            }
        ?>
    </script>

</body>

</html>