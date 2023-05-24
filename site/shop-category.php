<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');
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
    <title>Irokolifestyle - Shops by Category</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="assets/css/vendors/ion.rangeSlider.min.css" />

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
        <?php 
            if (isset($_GET['id']))
            {
                $id = $_GET['id'];
                $category = getByID("category", $id);

                if (mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                                                    
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Shop by Category</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $data['name'];?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">                
                <div class="col-lg-12 col-12 ratio_30">
                    <div class="banner-deatils">
                        <div class="banner-image">
                            <img src="uploads/<?= $data['image']; ?>" alt="no-img" class="img-fluid bg-img blur-up lazyload"
                                alt="">
                            <div class="banner-content">
                                <div>
                                    <h3><?= $data['name']; ?></h3>                                    
                                </div>
                            </div>
                        </div>
                        <div class="banner-contain mt-3 mb-5">
                            <p class="font-light"><?= $data['description']; ?></p>
                        </div>
                    </div>
                    <?php 
                        }
                    }
                    else{
                        echo "no id";
                    }
                    ?>
                    
                    <!-- label and featured section -->

                    <!-- Prodcut setion -->                    
                    <div
                        class="row g-sm-4 g-3 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 gx-sm-4 gx-3 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">

                        <?php 
                            $query = "SELECT * FROM products where category_id= '$id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0)
                            {
                                foreach ($query_run as $data)
                                {
                        ?>
                            <div class="product-box product_data">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-details.php?id= <?= $data['id'];?>">
                                            <img src="uploads/<?= $data['image'];?>"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>                                    
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <input type="hidden" class="cost" value="<?= $data['price'];?>">
                                                <button type="button" class="addToCartBtn1" value="<?= $data['id'];?>">
                                                    <i style="color:white;" data-feather="shopping-bag"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <a href="product-details.php?id= <?= $data['id'];?>">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>                                            
                                            <li>
                                                <input type="hidden" class="cost" value="<?= $data['price'];?>">
                                                <button type="button" class="addToWishlistBtn" value="<?= $data['id'];?>">
                                                    <i style="color:white;" data-feather="heart"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content"><?= $data['description'];?></span>                                        
                                    </div>
                                    <div class="main-price">
                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                            <h5 class="ms-0"><?= $data['name'];?></h5>
                                        </a>                                        
                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                                                    
                        <!-- Prodcut setion -->
                    </div>                                        
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->

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

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

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

    <!-- Price Filter js -->
    <script src="assets/js/price-filter.js"></script>

    <!--Plugin JavaScript file-->
    <script src="assets/js/ion.rangeSlider.min.js"></script>

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