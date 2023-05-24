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
    <title>Paystack Payment</title>

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
                            <li class="breadcrumb-item active" aria-current="page"> Paystack Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container">            
            <div class="row g-4">
                <div class="col-lg-8">
                    <h3 class="mb-3">Paystack Checkout</h3>
                    <?php
                        $order_id = $_SESSION['order_id'];
                        $query = "SELECT * FROM orders where id=$order_id";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0)
                        {
                            while ($rows=mysqli_fetch_assoc($query_run))
                            {
                    ?>
                    <form id="paymentForm">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" value="<?= $rows['fname'];?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" value="<?= $rows['lname'];?>" required>
                            </div>
                            <div class="col-md-6">
                            <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $rows['email'];?>"
                                    required>
                            </div> 
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Total Amount</label>
                                <br>
                                <input type="hidden" class="form-control" id="price" value="<?= $rows['total_price'];?>"
                                    required>
                                <h2>&#8358; <?= number_format($rows['total_price']);?></h2>
                            </div>                                                       
                        </div>
                        <?php 
                            }
                        }
                        
                        ?>

                        <hr class="my-lg-5 my-4">
                            
                        <button type="submit" class="btn btn-solid-default mt-4" onclick="payWithPaystack()">Pay Now</button>
                    </form>
                    <script src="https://js.paystack.co/v1/inline.js"></script> 
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
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
    <!-- Cart Section End -->

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

    <script>
	  const paymentForm = document.getElementById('paymentForm');
	  paymentForm.addEventListener("submit", payWithPaystack, false);
	  function payWithPaystack(e) {
	    e.preventDefault();

	    let handler = PaystackPop.setup({
	      key: 'pk_test_62f1ff7cd153066f83b908bd78740a64de368ce4', // Replace with your public key
	      firstname: document.getElementById("fname").value,
	      lastname: document.getElementById("lname").value,
	      email: document.getElementById("email").value,
	      amount: document.getElementById("price").value * 100,
	      ref: 'IRPP'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
	      // label: "Optional string that replaces customer email"
	      onClose: function(){
	        window.location = "./checkout.php";
        	alert('Transaction Cancelled.');
	      },
	      callback: function(response){	       
	       window.location = "functions/verify-paystack-transaction.php?reference=" + response.reference;
	      }
	    });

	    handler.openIframe();
	  }
	</script>

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