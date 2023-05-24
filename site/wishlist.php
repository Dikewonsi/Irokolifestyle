<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');

    if (!isset($_SESSION['auth_user']))
    {
        // code...
        $userid = $_SESSION['auth_user']['user_id'];
        header("location:index.php");
        exit();
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
    <title>Wishlist</title>

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
                <a href="wishlist.php" class="active">
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
                    <h3>Wishlist</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->


    <?php 
        $items = getWishlist(); 

        if(mysqli_num_rows($items) > 0)
        {
    ?>

        <!-- Cart Section Start -->
        <section class="wish-list-section section-b-space">
            <div class="container">
                <div class="row" id="mywish">
                    <div class="col-sm-12 table-responsive">
                        <table class="table cart-table wishlist-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">Image</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">availability</th>
                                    <th scope="col">action</th>
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
            </section>
        <!-- Order Success Section End -->

    <?php
        }
    ?>

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