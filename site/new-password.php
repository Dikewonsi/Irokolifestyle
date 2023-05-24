<?php 
    session_start();
    $email = $_SESSION['email'];
    include ("config/db-conn.php");
    include('functions/user-functions.php');
    $errors = array();

    //if user click change password button
    if(isset($_POST['change'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);
        if($password !== $cpassword){
            $errors['password'] = "Passwords do not match!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session            
            $update_pass = "UPDATE users SET code = $code, password = '$password' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password has been changed. You can now login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
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
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.jpg>
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
                    <h2>New Password</h2>
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
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="is-invalid" id="password">
                        <span class="spin"></span>
                    </div>
                    <div class="input">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" name="cpass" class="is-invalid" id="cpass">
                        <span class="spin"></span>
                    </div>

                    <p class="theme-color"><input class="form-check-input" type="radio"  onclick="myFunction()"> Show Password</p>

                    <div class="button login button-1">
                        <button type="submit" name="change">
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

    <script>
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

    </script>

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