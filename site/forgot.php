<?php
    include('config/db-conn.php');
    include('functions/user-functions.php');
    error_reporting(E_ALL);
    ini_set('display_errors',TRUE);
    $errors = array();

    //if user signup button
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);

            if($run_query){
                // set the location of the template file to be loaded
              $template_file = "./forgot-password-template.php";

              // set the email 'from' information
              $email_from = "Kariba from IrokoLifestyle <info@jeffreyisibor.dev>";

              // create a list of the variables to be swapped in the html template
              $swap_var = array(
                "{SITE_ADDR}" => "https://jeffreyisibor.dev",
                "{EMAIL_TITLE}" => "Reset Password",                
                "{TO_EMAIL}" => "$email",
                "{OTP}" => "$code"
              );

              // create the email headers to being the email
              $email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
              $email_headers .= "MIME-Version: 1.0\r\n";
              $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                // load the email to and subject from the $swap_var
              $email_to = $swap_var['{TO_EMAIL}'];
              $email_subject = $swap_var['{EMAIL_TITLE}']; // you can add time() to get unique subjects for testing: time();

                  // load in the template file for processing (after we make sure it exists)
                  if (file_exists($template_file))
                    $email_message = file_get_contents($template_file);
                  else
                    die ("Unable to locate your template file");

                      // search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
                        foreach (array_keys($swap_var) as $key){
                            if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                          $email_message = str_replace($key, $swap_var[$key], $email_message);
                        }
               

                      // send the email out to the user 
                      if ( mail($email_to, $email_subject, $email_message, $email_headers) ){
                         $info = "A message that contains an OTP has been sent to your email address to continue, copy and paste it here to finish up your registration.";
                          $_SESSION['info'] = $info; 
                          header('Location: reset-otp.php');
                      }else{
                        $errors['email'] = "Error in sending email";
                }
            }
        }else{
            $errors['email'] = "The email entered is incorrect. Try again.";
        }
    }
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
    <meta name="apple-mobile-web-app-title" content="Voxo">
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.jpg">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="assets/images/favicon/favicon.jpg" type="image/x-icon">
    <title>IrokoLifestyle - Forgot Password</title>

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
    

    <!-- Sign Up Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
                <div class="login-title">
                    <h2>Forgot Password</h2>
                </div>
                <br>
                <div>
                    <?php
                        if(count($errors) == 1){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }elseif(count($errors) > 1){
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach($errors as $showerror){
                                    ?>
                                    <li><?php echo $showerror; ?></li>
                                    <?php
                                }
                                ?>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input">
                        <label for="emailname">Enter Email Address</label>
                        <input type="email" name="email" class="is-invalid" id="emailname">
                        <span class="spin"></span>
                    </div>
                    <div class="button login button-1">
                        <button type="submit" name="submit">
                            <span>submit</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up Section End -->

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

    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>

</body>

</html>