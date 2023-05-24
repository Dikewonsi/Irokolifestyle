<?php
    session_start();
    include('config/db-conn.php');
    include('functions/user-functions.php');

    // Getting the user_id of the user. If the user is not registered, the user_id automatically becomes his/her IP Address.

    if(isset($_SESSION['auth']))
    {
        $userid = $_SESSION['auth_user']['user_id'];
    }
    else
    {
        $userid = getenv("REMOTE_ADDR") ;                     
    }
    
    $sql = "SELECT count('id') FROM carts WHERE user_id='$userid'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);   
    
    //If nothing is in the cart, send user back to home page
    if(($row[0]) < 1)
    {
        header("Location: index.php");
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
    <title>Checkout</title>

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
                    <h3>Checkout</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->




    <!-- Checkout Section Start -->
    <section class="section-b-space">
        <div class="container">            
            <div class="row g-4">
                <div class="col-lg-8">
                    <button class="btn btn-solid-default mt-4" name="placeOrderBtn" type="submit">Login to Continue</button>
                    <br><br>
                    <h3>Or Continue as a Guest by completing the form below.</h3>
                    <br><br>
                    <h3 class="mb-3">Billing address</h3>
                    <form action="functions/placeorder.php" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                            </div>
                            <div class="col-md-6">
                            <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone" placeholder="08012345678"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp"
                                    placeholder="1234 Main St" required>                                    
                            </div>

                            <div class="col-md-5">
                                <label for="validationCustom04" class="form-label">State</label>
                                <select class="form-select custome-form-select" name="state" id="validationCustom04">
                                    <option selected disabled value="">Choose...</option>
                                    <option value="Abuja FCT">ABUJA FCT</option>
                                    <option value="Abia">ABIA</option>
                                    <option value="Adamawa">ADAMAWA</option>
                                    <option value="Akwa Ibom">AKWA IBOM</option>
                                    <option value="Anambra">ANAMBRA</option>
                                    <option value="Bauchi">BAUCHI</option>
                                    <option value="Bayelsa">BAYELSA</option>
                                    <option value="Benue">BENUE</option>
                                    <option value="Borno">BORNO</option>
                                    <option value="Cross River">CROSS RIVER</option>
                                    <option value="Delta">DELTA</option>
                                    <option value="Ebonyi">EBONYI</option>
                                    <option value="Edo">EDO</option>
                                    <option value="Ekiti">EKITI</option>
                                    <option value="Enugu">ENUGU</option>
                                    <option value="Gombe">GOMBE</option>
                                    <option value="Imo">IMO</option>
                                    <option value="Jigawa">JIGAWA</option>
                                    <option value="Kaduna">KADUNA</option>
                                    <option value="Kano">KANO</option>
                                    <option value="Katsina">KATSINA</option>
                                    <option value="Kebbi">KEBBI</option>
                                    <option value="Kogi">KOGI</option>
                                    <option value="Kwara">KWARA</option>
                                    <option value="Lagos">LAGOS</option>
                                    <option value="Nassarawa">NASSARAWA</option>
                                    <option value="Niger">NIGER</option>
                                    <option value="Ogun">OGUN</option>
                                    <option value="Ondo">ONDO</option>
                                    <option value="Osun">OSUN</option>
                                    <option value="Oyo">OYO</option>
                                    <option value="Plateau">PLATEAU</option>
                                    <option value="Rivers">RIVERS</option>
                                    <option value="Sokoto">SOKOTO</option>
                                    <option value="Taraba">TARABA</option>
                                    <option value="Yobe">YOBE</option>
                                    <option value="Zamfara">ZAMFARA</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="number" class="form-control" name="zip" id="zip" aria-describedby="emailHelp"
                                    placeholder="970213">
                            </div>
                        </div>

                        <hr class="my-lg-5 my-4">

                        <h3 class="mb-3">Payment Method</h3>

                        <div class="d-block my-3">
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="payment_method" id="paystack" value="paystack">
                                <label class="form-check-label" for="paystack">Paystack</label>
                            </div>

                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="payment_method" id="credpal" value="credpal">
                                <label class="form-check-label" for="credpal">Credpal</label>
                            </div>

                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="payment_method" id="wallet" value="wallet">
                                <label class="form-check-label" for="credpal">Wallet</label>
                            </div>
                        </div>                            
                        <button class="btn btn-solid-default mt-4" name="placeOrderBtn" type="submit">Continue
                            to checkout</button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
                        //Fetch Cart Items
                        <?php
                            $sql = "SELECT count('id') FROM carts WHERE user_id='$userid'";
                            $result = $conn->query($sql);
                            $row=mysqli_fetch_array($result);                                                                                                                                
                        ?>
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<span class="badge bg-theme new-badge rounded-pill ms-auto bg-dark"><?php echo "$row[0]"; ?></span>
                        </h3>
                        <ul class="list-group mb-3">
                            <?php $items = getCartItems(); 
                                foreach ($items as $citem) 
                                {
                                    
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0"><?= $citem['name'];?></h6>
                                            <small>Unit Price - &#8358;<?= number_format($citem['price']);?></small>
                                            <br>
                                            <small>Quantity - <?= $citem['prod_qty'];?></small>
                                        </div>
                                        <span>&#8358;<?= number_format($citem['total_price']);?></span>
                                    </li>
                                    <?php
                                }
                            ?>   <?php
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
                                <li class="list-group-item d-flex lh-condensed justify-content-between">
                                    <span class="fw-bold">Total (NGN)</span>
                                    <strong>&#8358;<?= number_format($sub_total);?></strong>
                                </li>
                        </ul>                        
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <!-- Checkout Section End -->

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

    <!-- Notify js -->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>