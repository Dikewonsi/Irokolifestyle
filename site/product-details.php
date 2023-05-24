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
    <meta name="apple-mobile-web-app-title" content="IrokoLifestyle" />
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
    <meta name="description" content="IrokoLifestyle">
    <meta name="keywords" content="IrokoLifestyle">
    <meta name="author" content="IrokoLifestyle">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon" />
    <title>Product Details</title>

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
    <?php include('includes/header.php'); ?>
    <!-- header end -->

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
                    <h3>Product Details</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <?php 
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            
            $product = getByID("products",$id);  

            if (mysqli_num_rows($product) > 0)                                            
            {
                $data = mysqli_fetch_array($product)
    ?>
                <!-- Shop Section start -->
    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items product_data">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="row g-4">
                                    <div class="col-sm-10">
                                        <div class="details-image-1 ratio_asos">
                                            <div>
                                                <img src="uploads/<?= $data['image'];?>" id="zoom_01"                                                    
                                                    class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="no-img">
                                            </div>                                            
                                        </div>
                                    </div>                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="cloth-details-size">                                    

                                    <div class="details-image-concept">
                                        <h2><?= $data['name'];?></h2>
                                    </div>

                                    <div class="label-section">
                                        <span class="badge badge-grey-color">#1 Best seller</span>
                                        <span class="label-text">in 
                                            <?php 
                                                $cat = $data['category_id'];
                                                $cat_query = "SELECT name FROM category WHERE id = '$cat'";
                                                $result = $conn->query($cat_query);

                                                if ($result->num_rows > 0) {
                                                  // output data of each row
                                                  while($rows = $result->fetch_assoc()) {
                                                    echo $rows['name'];
                                                  }
                                                } else {
                                                  echo "0 results";
                                                }

                                            ?>
                                            
                                        </span>
                                    </div>

                                    <h3 class="price-detail price">&#8358;<?= number_format($data['price']); ?></span></h3>

                                    <div class="mt-2 mt-md-3 border-product">
                                        <h6 class="product-title hurry-title d-block">Hurry Up! Left
                                            <span><?= $data['qty'];?></span> in
                                            stock
                                        </h6>
                                        <input type="hidden" class="cost" value="<?= $data['price'];?>">
                                    </div>  
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $data['qty'];?>%">
                                        </div>
                                    </div>                                   

                                    <div id="selectSize" class="addeffect-section product-description border-product">                                        
                                        <h6 class="product-title product-title-2 d-block">quantity</h6>

                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-qty"
                                                    value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-buttons">
                                        <button type="button" class="btn btn-solid hover-solid btn-animation addWishBtn" value="<?= $data['id'];?>">
                                            <i class="fa fa-heart"></i>
                                            <span>Add To Wishlist</span>
                                        </button>
                                        <button type="button" id="cartEffect" class="btn btn-solid hover-solid btn-animation addToCartBtn" value="<?= $data['id'];?>">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span>
                                        </button>
                                    </div>

                                    <ul class="product-count shipping-order">
                                        <li>
                                            <img src="assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                                                alt="image">
                                            <span class="lang">Delivery within Lagos will take 24-48 Hrs, while delivery outside Lagos will take a maximum of 5 days.</span>
                                        </li>
                                    </ul>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                
                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Description
                                </button>                                
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                    <div class="part">                                        
                                        <p class="font-light">
                                        <?php
                                            echo $data['description'];
                                        ?>
                                        </p>
                                    </div>                                   
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->

    <?php
            }
            else
            {
                echo "Product Not found for given ID in url";
            }                                   
                                    
        }
        else
        {
            echo "ID is Missing from url";
        }
    ?>
    


    <!-- Recommendation section start -->
    <section class="ratio_asos section-b-space overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-lg-4 mb-3">Similar Products</h2>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">

                    <?php 
                        $cat = $data['category_id'];
                        $cat_query = "SELECT * FROM products WHERE category_id = '$cat'";
                        $result = $conn->query($cat_query);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($rows = $result->fetch_assoc())
                          {
                            ?>
                    
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="product-details.php?id= <?= $rows['id'];?>">
                                            <img src="uploads/<?= $rows['image'];?>"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>                                    
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                                        
                    

                        <?php

                          }
                        }
                        else
                        {
                          echo "0 results";
                        }

                    ?> 
                    </div>                   
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

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

    <!-- timer js -->
    <script src="assets/js/timer.js"></script>

    <!-- sticky cart bottom js-->
    <script src="assets/js/sticky-cart-bottom.js"></script>

    <!-- sticky cart bottom js-->
    <script src="assets/js/check-box-select.js"></script>

    <!-- Zoom Js -->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <script src="assets/js/zoom-filter.js"></script>

    <!--Plugin JavaScript file-->
    <script src="assets/js/ion.rangeSlider.min.js"></script>

    <!-- Filter Hide and show Js -->
    <script src="assets/js/filter.js"></script>

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

</body>

</html>