<footer class="footer-sm-space">
        <div class="main-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-contact">
                            <div>
                                <a href="index.php" class="footer-logo">                                    
                                    <img src="assets/images/iroko.png" class="img-fluid blur-up lazyload" alt="logo">
                                </a>
                            </div>
                            <ul class="contact-lists">
                                <li>
                                    <span><b>phone:</b> <span class="font-light"> + 2349034140514</span></span>

                                </li>
                                <li>
                                    <span><b>Address:</b><span class="font-light"> 58, Agboyi Road Ogudu, Lagos, NIgeria</span></span>
                                </li>
                                <li>
                                    <span><b>Email:</b><span class="font-light" style="text-transform:lowercase;"> info@irokolifestyle.com</span></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Quick Links</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="index.php" class="font-dark">Home</a>
                                    </li>
                                    <li>
                                        <a href="about-us.php" class="font-dark">About Us</a>
                                    </li>     
                                    <li>
                                        <a href="wishlist.php" class="font-dark">Your Wishlist</a>
                                    </li>                                                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <?php 
                                        $category = getAllActive("category");

                                        if (mysqli_num_rows($category) > 0)
                                        {
                                            foreach ($category as $data)
                                            {
                                                ?>
                                                    <li>
                                                        <a href="shop-category.php?id= <?= $data['id'];?>" class="font-dark"><?= $data['name'];?></a>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Get Help</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="user-dashboard.php" class="font-dark">Your Orders</a>
                                    </li>
                                    <li>
                                        <a href="user-dashboard.php" class="font-dark">Your Account</a>
                                    </li>                                                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                        <div class="footer-newsletter">
                            <h3>Let’s stay in touch</h3>
                            <div class="form-newsletter">
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control color-4" placeholder="Your Email Address">
                                    <span class="input-group-text" id="basic-addon4"><i
                                            class="fas fa-arrow-right"></i></span>
                                </div>
                                <p class="font-dark mb-0">Keep up to date with our latest news and special offers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-6">
                        <ul>
                            <li class="font-dark">We accept:</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/4.png" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/1.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/2.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/3.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0 font-dark">© <?php echo date("Y"); ?>, Iroko Lifestyle. Powered by VORTEX</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>