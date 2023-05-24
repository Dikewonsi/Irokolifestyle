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
    <title>IrokoLifestyle - About Us</title>

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
                    <h3>About Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- team leader section Start -->
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 offset-xl-1">
                    <div class="row g-3">                        
                        <div class="col-12 ratio_40">
                            <div>
                                <img src="assets/images/favicon/ico.jpg"
                                    class="img-fluid rounded-3 team-image bg-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-details">
                        <div>
                            <h2>IRÒKÓ FURNITURE</h2>
                            <h3>WHO WE ARE:</h3>
                            <p>
                            Iròkó is a leading furniture and lifestyle brand and the pioneer of Nigeria’s first self-assembled furniture. Our newly released, universally accessible, ready-to-assemble sofas and bed frames have been thoughtfully constructed such that they are all ready for you to build at home, or just about anywhere else.
                            
                            With an extensive experience using ethical and sustainable production methods to make premium furniture accessible and affordable, we understood the demand for furniture that is more space- and storage-efficient and easier to disassemble if moving, so we developed furniture that comes with all the parts needed for construction and requires absolutely no tools to fit together. Our self-assembled furniture comes with full and comprehensive instructions, which are very easy to follow for every homeowner. Additionally, we provide assembly services at an additional cost to those who need professional assistance.
                            We make premium furniture available and affordable through sustainable and responsible production. We believe great furniture can be crafted in Nigeria and be accessible to anyone in the world. Our inventive method of using 70% recycled and repurposed wood and other materials for our furniture pieces has allowed us to significantly lower our production costs, ensuring that our high-end furniture pieces are both reasonably priced and environmentally responsible.
                            
                            We constantly work to stay abreast of shifting consumer attitudes and behaviors. This guarantees that each of our pieces is distinctive, and it also demonstrates our unwavering commitment to ongoing development. Our talented team of close-knit designers, architects, carvers, installers, and carpenters collaborate from our manufacturing hub in Lagos to create furniture that brings everyone comfort and joy.
                            We prioritize the needs of the user in all of our designs and productions, fusing usability with Afrocentric design into a sophisticated solution.
                            
                            No matter what form they take—sofas, ottomans, stools, hand-painted throw pillows, etc.—we make it our business to consider how our products interact with your surroundings and how they might affect your productivity. This is why we can create furniture that enhances rather than competes with your space.
                            Additionally, we put each piece of furniture through a rigorous quality check before packaging and delivering it to your door, starting with the idea and continuing through production.
                            
                            All Iròkó furniture pieces are manufactured sustainably using recycled and raw materials; should we have to use raw materials, we exclusively source these from registered and accredited tree-fellers.
                            
                            Iròkó Furniture products are available for shipping globally through our e-commerce store, we equally have pop-up experience centers where clients can walk in to experience and feel our furniture and home accessory pieces.
                            Click here to learn about our sustainability and climate efforts.

                            </p>                            
                            <button onclick="location.href = 'shop-left-sidebar.html';" type="button"
                                class="btn btn-solid-default">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section End -->    

    <!-- service section start -->
    <section class="service-section service-style-2 section-b-space">
        <div class="container">
            <div class="row g-4 g-sm-3">
                <div class="col-xl-3 col-sm-6">
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
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#shop"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Delivery Nationwide</h3>
                            <span class="font-light">Free shipping on orders over &#8358;200,000.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
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