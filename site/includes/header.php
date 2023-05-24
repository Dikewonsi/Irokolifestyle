<header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div>
                                    <a href="index.php">                                                                                                                   
                                        <img src="assets/images/iroko.png" class="img-fluid blur-up lazyload" alt="logo">
                                    </a>
                                </div>
                                <div class="category-menu">
                                    <div class="category-dropdown">
                                        <div class="close-btn d-xl-none">
                                            Category List
                                            <span class="back-category"><i class="fa fa-angle-left"></i>
                                            </span>
                                        </div>                                        
                                        <ul>
                                            <?php 
                                                $category = getAllActive("category");

                                                if (mysqli_num_rows($category) > 0)
                                                {
                                                    foreach ($category as $data)
                                                    {
                                                        ?>
                                                            <li>
                                                                <a href="shop-category.php?id= <?= $data['id'];?>"><?= $data['name'];?></a>
                                                            </li>
                                                        <?php
                                                    }
                                                }
                                            ?>                                                                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div>
                                            </li>
                                            
                                            <li>
                                                <a href="index.php" class="nav-lin">HOME</a>
                                            </li>
                                            <?php 
                                                $category = getAllActive("category");

                                                if (mysqli_num_rows($category) > 0)
                                                {
                                                    foreach ($category as $data)
                                                    {
                                                        ?>
                                                            <li>
                                                                <a href="shop-category.php?id= <?= $data['id'];?>"><?= $data['name'];?></a>
                                                            </li>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <li class="mega-menu dropdown ratio_40">
                                                <a style="margin-left:-10px;" href="javascript:void(0)" class="nav-link menu-title">
                                                    <div class="gradient-title">Shop other stores</div>
                                                </a>
                                                <div class="mega-menu-container poster-bg-image menu-content">
                                                    <div class="container-fluid">
                                                        <div class="row row-cols-5">
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="submenu-title">
                                                                        <h5>US Store</h5>
                                                                    </div>
                                                                    <div class="submenu-content opensubmegamenu">
                                                                        <ul class="list">
                                                                            <li>
                                                                                <a href="javasvript:void(0);">Coming Soon</a>
                                                                            </li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="submenu-title">
                                                                        <h5>UK Store</h5>
                                                                    </div>
                                                                    <div class="submenu-content opensubmegamenu">
                                                                        <ul class="list">
                                                                            <li>
                                                                                <a href="javasvript:void(0);">Coming Soon</a>
                                                                            </li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="submenu-title">
                                                                        <h5>Ghana Store</h5>
                                                                    </div>
                                                                    <div class="submenu-content opensubmegamenu">
                                                                        <ul class="list">
                                                                            <li>
                                                                                <a href="javasvript:void(0);">Coming Soon</a>
                                                                            </li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="submenu-title">
                                                                        <h5>Canada Store</h5>
                                                                    </div>
                                                                    <div class="submenu-content opensubmegamenu">
                                                                        <ul class="list">
                                                                            <li>
                                                                                <a href="javasvript:void(0);">Coming Soon</a>
                                                                            </li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mobile-poster d-flex d-xl-none">
                                                <img src="assets/images/pwa.png" class="img-fluid" alt="">
                                                <div class="mobile-contain">
                                                    <h5>Enjoy app-like experience</h5>
                                                    <p class="font-light">With this Screen option you can use Website
                                                        like an App.</p>
                                                    <a href="javascript:void(0)" id="installApp"
                                                        class="btn btn-solid-default btn-spacing w-100">ADD TO
                                                        HOMESCREEN</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>                                    
                                    <?php 
                                        if(isset($_SESSION['auth']))
                                        {
                                        ?>
                                            <li class="onhover-dropdown">
                                                <div class="cart-media">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <div class="onhover-div profile-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="user-dashboard.php" class="d-block">Profile</a>
                                                        </li>
                                                        <li>
                                                            <a href="includes/logout.php" class="d-block">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>  
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <li class="onhover-dropdown">
                                                <div class="cart-media">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <div class="onhover-div profile-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="log-in.php" class="d-block">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="sign-up.php" class="d-block">Register</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                    ?>     
                                    <?php 
                                        if(isset($_SESSION['auth']))
                                        {
                                        ?>

                                            <li class="onhover-dropdown wislist-dropdown" id="mywishnum">
                                                <div class="cart-media">
                                                    <?php
                                                        $userid = $_SESSION['auth_user']['user_id'];
                                                        

                                                        $sql = "SELECT count('id') FROM wishlist WHERE user_id='$userid'";
                                                        $result = $conn->query($sql);
                                                        $row=mysqli_fetch_array($result);                                                                                                                                
                                                    ?>
                                                    <a href="wishlist.php">
                                                        <i data-feather="heart"></i>
                                                        <span class="label label-theme rounded-pill"><?php echo "$row[0]"; ?></span>
                                                    </a>
                                                </div>                                               
                                            </li>     
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <li class="onhover-dropdown wislist-dropdown">
                                                <div class="cart-media">                                                    
                                                    <a href="javascript:void(0);">
                                                        <i data-feather="heart"></i>
                                                        <span class="label label-theme rounded-pill">0</span>
                                                    </a>
                                                </div>
                                                <div class="onhover-div">
                                                    <a href="wishlist.php">
                                                        <div class="wislist-empty">
                                                            <i class="fab fa-gratipay"></i>
                                                            <h6 class="mb-1">Your wishlist empty !!</h6>
                                                            <p class="font-light mb-0">explore more and save items.</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php
                                        }     
                                        ?>                                                                      
                                        <li class="onhover-dropdown cart-dropdown" id="mycart">
                                            <?php $items = getCartItems(); 
                                            foreach ($items as $citem)
                                            {
                                                $image = $citem['image'];
                                            }
                                                ?>
                                                <button type="button" class="btn btn-solid-default btn-spacing">
                                                        <?php                                                            

                                                            if(isset($_SESSION['auth']))
                                                            {
                                                                $user_id = $_SESSION['auth_user']['user_id'];
                                                            }
                                                            else
                                                            {
                                                                //using the IP Address of the user as the unique ID in the customers table on the Database, if the user does not login before adding to cart.
                                                                $user_id = getenv("REMOTE_ADDR") ;                     
                                                            }

                                                            $sql = "SELECT sum(total_price) as sub_total from carts WHERE user_id='$user_id' ";
                                                            $result = $conn->query($sql);
                                                            while($record = $result->fetch_array()){
                                                                $sub_total = $record['sub_total'];
                                                                }                                                 
                                                        ?>
                                                    <i data-feather="shopping-cart" class="pe-2"></i>
                                                    <span>&#8358;<?php echo number_format($sub_total)?></span>                                                    
                                                </button>
                                                <div class="onhover-div">
                                                    <div class="cart-menu">
                                                        <div class="cart-title">
                                                            <h6>
                                                                <?php
                                                                    $sql = "SELECT count('id') FROM carts WHERE user_id='$user_id'";
                                                                    $result = $conn->query($sql);
                                                                    $row=mysqli_fetch_array($result);                                                                                                                                
                                                                ?>
                                                                <i data-feather="shopping-cart"></i>
                                                                <span class="label label-theme rounded-pill"><?php echo "$row[0]"; ?></span>
                                                            </h6>
                                                            <span class="d-md-none d-block">
                                                                <i class="fas fa-arrow-right back-cart"></i>
                                                            </span>
                                                        </div>
                                                        <ul class="custom-scroll">
                                                            <?php
                                                                 
                                                                     $items = getCartItems(); 
                                                                    foreach ($items as $data)
                                                                    {                                                                                                                                                                                                     
                                                            ?>
                                                            <li>
                                                                <div class="media">
                                                                    <img src="uploads/<?= $data['image'];?>"
                                                                        class="img-fluid blur-up lazyload" alt="">
                                                                    <div class="media-body">
                                                                        <h6><?= $data['name'];?></h6>
                                                                        <div class="qty-with-price">
                                                                            <span>&#8358;<?= number_format($data['total_price']);?></span>
                                                                            <span>
                                                                                <input type="text"  class="form-control"
                                                                                    value="<?= $data['prod_qty'];?>">
                                                                            </span>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                            </li>    
                                                            <?php
                                                                    }
                                                                
                                                            ?>                                                
                                                        </ul>
                                                    </div>
                                                    <div class="cart-btn">                                                    
                                                        <h6 class="cart-total"><span class="font-light">Total:</span> &#8358;<?php echo number_format($sub_total)?></h6>
                                                        <button onclick="location.href = 'cart.php';" type="button"
                                                            class="btn btn-solid-default btn-block">
                                                            View Cart
                                                        </button>
                                                        <br>
                                                        <button onclick="location.href = 'checkout.php';" type="button"
                                                            class="btn btn-solid-default btn-block">
                                                            Proceed to Checkout
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                
                                        </li>                                                                                             
                                </ul>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>