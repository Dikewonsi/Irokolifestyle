<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <link rel="manifest" href="./manifest.json">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.jpg">
    <meta name="theme-color" content="#977767">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="IrokoLifestyle">
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.jpg">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IrokoLifestyle">
    <meta name="keywords" content="IrokoLifestyle">
    <meta name="author" content="IrokoLifestyle">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon">
    <title>IrokoLifestyle - Home</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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
                <a href="index.php" class="active">
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

    <!-- home slider start -->
    <section class="pt-0 poster-section">
        <div class="poster-image slider-for custome-arrow classic-arrow">
            <div>
                <img src="assets/images/furniture-images/poster/background.JPG" class="img-fluid blur-up lazyload" alt="">
            </div>
            <!-- <div>
                <img src="assets/images/furniture-images/poster/002.JPG" class="img-fluid blur-up lazyload" alt="">
            </div>
            <div>
                <img src="assets/images/furniture-images/poster/003.JPG" class="img-fluid blur-up lazyload" alt="">
            </div> -->
        </div>
        <!-- <div class="slider-nav image-show">
            <div>
                <div class="poster-img">
                    <img src="assets/images/furniture-images/poster/1.jpg" class="img-fluid blur-up lazyload" alt="">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="poster-img">
                    <img src="assets/images/furniture-images/poster/2.jpg" class="img-fluid blur-up lazyload" alt="">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="poster-img">
                    <img src="assets/images/furniture-images/poster/3.jpg" class="img-fluid blur-up lazyload" alt="">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="left-side-contain">
            <div class="banner-left" style="background-color: rgb(121 85 72 / 0%)">
                <h4>Sale <span class="theme-color">15% Off</span></h4>                
                <h1>New Latest <span>Design</span></h1>
                <p>BUY THREE GET ONE <span class="theme-color">FREE</span></p>
                <h2>&#8358;180,000 <span class="theme-color"><del>&#8358;195,000</del></span></h2>
                <p class="poster-details mb-0">Hurry now to grab this amazing offer.</p>
            </div>
        </div>    
    </section>
    <!-- home slider end -->

    <!-- Category Slider Section Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slide-7-1 product-wrapper slick-lg-space">
                        //Get All Categories
                        <?php 
                                $category = getAllActive("category");

                                if (mysqli_num_rows($category) > 0)
                                {
                                    foreach ($category as $data)
                                    {
                                        ?>
                        <div>
                            <div class="image-slider">
                                <div class="image-product">
                                    <img src="uploads/<?= $data['image'];?>" class="w-100 blur-up lazyload"
                                        alt="">
                                    <div class="image-contain">
                                        <h5><?= $data['name'];?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <?php
                                    }
                                }
                        ?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Slider Section End -->

    <!-- New Arrival Section Start -->
    <section class="ratio_asos overflow-hidden">
        <div class="container p-sm-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="title-3 text-center">
                        <h2>New Arrival</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>
                </div>
            </div>

            <div class="row g-sm-4 g-3">
                <!-- Get All Products -->
                <?php 
                    $query = "SELECT * FROM products where status=1 ";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0)
                    {
                        foreach ($query_run as $data)
                        {
                ?>
                <div class="col-xl-3 col-lg-4 col-6">
                    <div class="product-box product_data">
                        <div class="img-wrapper">
                            <a href="product-details.php?id=<?= $data['id'];?>">
                                <img src="uploads/<?= $data['image'];?>"
                                    class="w-100 bg-img blur-up lazyload" alt="">
                            </a>
                            <div class="circle-shape"></div>                            
                            <div class="label-block">
                                <span class="label label-theme">POPULAR</span>
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
                                        <a href="product-details.php?id=<?= $data['id'];?>">
                                            <i style="color:white;" data-feather="eye"></i>
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
                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <p class="font-light mb-sm-2 mb-0">
                                <!-- echoing category name from DB -->
                                    <?php 
                                        $cat_id = $data['category_id'];

                                        $cat_sql = "SELECT * FROM category where id='$cat_id' ";
                                        $cat_sql_query_run = mysqli_query($conn, $cat_sql);

                                        if (mysqli_num_rows($cat_sql_query_run) > 0)
                                        {
                                            foreach ($cat_sql_query_run as $value) {
                                                echo $value['name'];
                                            }
                                        }
                                    ?>                                    
                                </p>
                                <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                    <h5><?= $data['name'];?></h5>
                                </a>
                            </div>
                            <div class="main-price">                            
                                <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php
                        }
                    }
                ?>               
            </div>
        </div>
    </section>
    <!-- New Arrival Section End -->

    <!-- service section start -->
    <section class="service-section service-style-2 section-b-space">
        <div class="container">
            <div class="row g-4 g-sm-3">
                <div class="col-xl-4 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#customer"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Customer Servcies</h3>
                            <span class="font-light">Top notch customer service, with round the clock support with our livechat feature</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#shop"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Delivery Nationwide</h3>
                            <span class="font-light">Free shipping on orders over &#8358;399,999. Delivery within Lagos will take 24-48 Hrs. <br>
                            Delivery outside Lagos will take a maximum of 5 days.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#secure-payment"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Secured Payment</h3>
                            <span class="font-light">We accept all major credit cards, using our paystack gateway</span>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <!-- service section end -->

     <!-- Sofa in a Box Start -->
    <section class="deal-section">
        <div class="container">
            <div class="row">
                <div align="center" class="col-md-12 px-0">
                    <img src="assets/images/furniture-images/poster/sofa-design.jpg"  style="width:400px" height="600px">
                </div>
            </div>
        </div>
    </section>


    <!-- Deal Day Section Start -->
    <section class="deal-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="discount-image-details-1">
                        

                        <div class="discunt-details mt-xl-0 mt-4">
                        <div class="theme-circle"></div>
                            <div>
                                <div class="heart-button">
                                    <i data-feather="heart"></i>
                                </div>

                                <div class="discount-shop">
                                    <h2 class="text-spacing">ONLINE WALLET</h2>
                                    <h6>BEST FEATURE</h6>
                                </div>

                                <h5 class="mt-3">We understand how hard 
                                    <br>it can be to  <span class="theme-color">purchase furniture outrightly</span></h5>
                                <h2 class="my-2 deal-text">Begin to <br>Save <span class="theme-color">Gradually</span> <br>on our platform now!</h2>
                                <h5 class="mt-3">and purchase <span class="theme-color">your desired products.</span></h5>

                                <button onclick="location.href = 'sign-up.php';" type="button"
                                    class="btn default-light-theme default-theme mt-2">Get Started</button>
                            </div>
                        </div>
                        <div class="discount-images">
                            
                            <img src="assets/images/furniture-images/deal/wallet1.png"
                                class="img-fluid shoes-images lazyload" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Day Section end -->    

    <!-- tab banner section start -->
    <!-- <section class="tab-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-3 text-center">
                        <h2>filtered by</h2>
                        <h5 class="theme-color">Categories</h5>
                    </div>
                    <div class="tab-wrap">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <button class="nav-link" id="camera-tab" data-bs-toggle="tab" data-bs-target="#sofas"
                                    type="button">Sofas</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="audio-tab" data-bs-toggle="tab" data-bs-target="#bedframes"
                                    type="button">Bedframes</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="navigation-tab" data-bs-toggle="tab"
                                    data-bs-target="#chairs" type="button">Accent Chairs</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active" id="other-tab" data-bs-toggle="tab"
                                    data-bs-target="#dining" type="button">Dining Sets</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="phones-tab" data-bs-toggle="tab" data-bs-target="#accessories"
                                    type="button">Accessories</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="computer-tab" data-bs-toggle="tab"
                                    data-bs-target="#gift" type="button">Gift Boxes</button>
                            </li>                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="sofas" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=1 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bedframes" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=2 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">prod<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="chairs" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=3 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="dining" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=4 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="accessories" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=5 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="gift" role="tabpanel">
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <?php 
                                            $query = "SELECT * FROM products where category_id=6 ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $data)
                                                {
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="text-center">
                                                            <img src="uploads/<?= $data['image'];?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">&#8358;<?= number_format($data['price']);?></h3>
                                                        <a href="product-details.php?id= <?= $data['id'];?>" class="font-default">
                                                            <h5><?= $data['name'];?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <?php
                                            }
                                        }
                                        ?>                                       
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- tab banner section end -->    


    <!-- footer start -->
    <?php include('includes/footer.php'); ?>
    <!-- footer end -->

    <!-- Newsletter modal start -->
    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="assets/images/newletter-icon.png" class="img-fluid blur-up lazyload" alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Sign up to our Newsletter!</h2>
                        <p class="font-light">Never miss any new updates or products we reveal, stay up to date.</p>
                        <p class="font-light">Oh, and it's free!</p>

                            <div class="input-group mb-3">
                                <input placeholder="Email" class="form-control" type="text">
                            </div>

                            <div class="cancel-button text-center">
                                <button class="btn default-theme w-100" data-bs-dismiss="modal"
                                    type="button">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter modal end -->
   
    <!-- Coockie Section Start -->
    <div class="cookie-bar-section">
        <div class="content">
            <img src="assets/images/cookie.png" alt="">
            <p class="font-light">This website use cookies to ensure you get the best experience on our website.</p>
            <div class="cookie-buttons">
                <button class="btn default-theme" id="button">I understand</button>
            </div>
        </div>
    </div>
    <!-- Coockie Section End -->    

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

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Timer Js -->
    <script src="assets/js/timer1.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- newsletter js -->
    <script src="assets/js/newsletter.js"></script>

    <!-- add to cart modal resize -->
    <script src="assets/js/cart_modal_resize.js"></script>

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

    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>

</body>

</html>