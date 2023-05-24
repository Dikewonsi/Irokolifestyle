<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');

    //Getting the user_id of the user. If the user is not registered, the user_id automatically becomes his/her IP Address.

    if(isset($_SESSION['auth_user']))
    {
        $userid = $_SESSION['auth_user']['user_id'];        
    }
    else
    {
        $userid = getenv("REMOTE_ADDR") ;                     
    }
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
    <meta name="apple-mobile-web-app-title" content="Irokolifestyle" />
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
    <meta name="description" content="Irokolifestyle">
    <meta name="keywords" content="Irokolifestyle">
    <meta name="author" content="Irokolifestyle">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon" />
    <title>Cart Page</title>

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
                <a href="cart.php" class="active">
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
                    <h3>Shopping Cart</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->
    

    <?php 
        $items = getCartItems(); 

        if(mysqli_num_rows($items) > 0)
        {
    ?>
        <!-- Cart Section Start -->
            <section class="cart-section section-b-space">
                <div class="container">
                    <div class="col-12 mt-md-5 mt-4">
                        <div class="row">
                            <div class="col-sm-7 col-5 order-1">
                            </div>
                            <div class="col-sm-5 col-7">
                                <div class="left-side-button float-start">
                                    <a href="index.php" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                        <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="mycarttable">              
                        <div class="col-sm-12 table-responsive mt-4">
                                        <table class="table cart-table product_data">
                                            <thead>
                                                <tr class="table-head">
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">product name</th>
                                                    <th scope="col">unit price</th>
                                                    <th scope="col">quantity</th>
                                                    <th scope="col">action</th>
                                                    <th scope="col">total</th>
                                                </tr>
                                            </thead>                                
                                            <?php 
                                            $items = getCartItems(); 
                                            foreach ($items as $citem)
                                            {
                                                
                                                ?>                                    
                                            <tbody>
                                                <tr>
                                                    <td>                                                    
                                                    <a href="product-details.php?id= <?= $citem['prod_id'];?>">
                                                            <img src="uploads/<?= $citem['image'];?>" class=" blur-up lazyload"
                                                                alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="product-details.php?id= <?= $citem['prod_id'];?>"><?= $citem['name'];?></a>
                                                        <input type="hidden" class="prod_id" value="<?= $citem['prod_id'];?>">
                                                        <div class="mobile-cart-content row">
                                                            <div class="col">
                                                                <div class="qty-box">
                                                                    <div class="input-group">  
                                                                        <form action="functions/update-cart.php" method="get" autocomplete="off">                                                              
                                                                            <input type="number" name="qty" class="form-control input-number"
                                                                            value="<?= $citem['prod_qty'];?>">
                                                                            <br>
                                                                            <input type="hidden" name="prod_id" value="<?= $citem['prod_id'];?>">
                                                                            <input type="hidden" name="price" value="<?= $citem['price'];?>">

                                                                            <button type="submit" name="update_qty" class="btn btn-solid-default rounded btn">Update</button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h2>&#8358;<?= number_format($citem['total_price']);?></h2>
                                                                <input type="hidden" class="cost" value="<?= $citem['price'];?>">
                                                            </div>
                                                            <div class="col">
                                                                <h2 class="td-color">
                                                                <button type="button" class="deleteItem" value="<?= $citem['cid'];?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </td>                                            
                                                    <td>
                                                        <h2>&#8358;<?= number_format($citem['price']);?></h2>
                                                        <input type="hidden" class="price" value="<?= $citem['price'];?>">                                                
                                                        <input type="hidden" class="qty" value="<?= $citem['prod_qty'];?>">
                                                    </td>
                                                    <td>
                                                        <div id="selectSize" class="addeffect-section product-description border-product">                                        
                                                            <div class="qty-box">
                                                                <div class="input-group">                                                                
                                                                <form action="functions/update-cart.php" method="get" autocomplete="off">                                                              
                                                                            <input type="number" name="qty" class="form-control input-number"
                                                                            value="<?= $citem['prod_qty'];?>">
                                                                            <br>
                                                                            <input type="hidden" name="prod_id" value="<?= $citem['prod_id'];?>">
                                                                            <input type="hidden" name="price" value="<?= $citem['price'];?>">

                                                                            <button type="submit" name="update_qty" class="btn btn-solid-default rounded btn">Update</button>

                                                                        </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="deleteItem" value="<?= $citem['cid'];?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    <td>                                               
                                                        <h2>&#8358;<?= number_format($citem['total_price']);?></h2>
                                                    </td>
                                                </tr>
                                            </tbody>                                                  
                                        
                                    <?php
                                }
                            ?>
                            </table>
                        </div>

                        <div class="col-12 mt-md-5 mt-4">
                            <div class="row">
                                <div class="col-sm-7 col-5 order-1">
                                    <div class="left-side-button text-end d-flex d-block justify-content-end">
                                        <button type="button" class="btn btn-solid-default rounded btn deleteAll" 
                                       
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                $userid = $_SESSION['auth_user']['user_id'];
                                            }
                                            else
                                            {
                                                //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                                                $userid = getenv("REMOTE_ADDR") ;                     
                                            }
                                        ?>
                                        
                                        value="<?= $userid;?>"><i class="fas fa-trash"></i> Clear all items</button>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-7">
                                    <div class="left-side-button float-start">
                                            <div class="col-5">
                                                
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart-checkout-section">
                            <div class="row g-4">

                                <div class="col-lg-4 col-sm-6 ">
                                    <div class="checkout-button">
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="cart-box">
                                        <div class="cart-box-details">
                                            <div class="total-details">
                                                <div class="top-details">
                                                    <h3>Cart Totals</h3>
                                                    <?php
                                                        if(isset($_SESSION['auth']))
                                                        {
                                                            $userid = $_SESSION['auth_user']['user_id'];
                                                        }
                                                        else
                                                        {
                                                            //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                                                            $userid = getenv("REMOTE_ADDR") ;                     
                                                        }

                                                        $sql = "SELECT sum(total_price) as sub_total from carts WHERE user_id='$userid' ";
                                                        $result = $conn->query($sql);
                                                        while($record = $result->fetch_array()){
                                                            $sub_total = $record['sub_total'];
                                                            }                                                 
                                                    ?>
                                                    <h6>Sub Total <span>&#8358;<?php echo number_format($sub_total)?></span></h6>                                        
                                                    <h6>Delivery Fee <span><del>&#8358;25.00</del></span></h6>   
                                                    <?php 
                                                        // $g_total = $sub_total*10
                                                    ?>                                                                                     
                                                    <h6>Grand Total <span>&#8358;<?php echo number_format($sub_total)?></span></h6>
                                                </div>
                                                <div class="bottom-details">
                                                    <a href="checkout.php">Proceed to Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Cart Section End -->    

    <?php
        }
        else
        {
    ?>

        <!-- Order Success Section Start -->
            <section class="pt-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="success-icon">
                                <div class="main-container">
                                    <div class="check-container">
                                        <div class="check-background" style="color:brown">
                                            <img src="assets/images/empty-cart.png" width="50px;" height="50px;" alt="">
                                        </div>
                                        <div class="check-shadow"></div>
                                    </div>
                                </div>

                                <div class="success-contain">
                                    <h4 style="color:#977767;">Your cart is empty</h4>          
                                    <hr>                          
                                    <a href="index.php" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                        <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- Order Success Section End -->

    <?php
        }
    ?>    


    

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

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js -->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js -->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- timer js -->
    <script src="assets/js/count-down-timer.js"></script>

    <!-- Notify js -->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/custom.js"></script>

   
    
</body>

</html>