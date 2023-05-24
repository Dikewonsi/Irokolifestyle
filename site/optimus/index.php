<?php
    include ("../config/db-conn.php");
    session_start();

    if (!isset($_SESSION['admin_id'])) {
        // code...
        header("location:login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Irokolifestyle - Dashboard</title>

    <!-- Header Start -->

    <?php include('header.php'); ?>

    <!-- Header End -->

            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- chart caard section start -->
                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class="custome-1-bg b-r-4 card-body">
                                    <div class="media align-items-center static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Users</span>
                                            <h4 class="mb-0 counter">
                                                <?php
                                                    $sql = "SELECT count('id') FROM users";
                                                    $result = $conn->query($sql);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>                                        
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class=" custome-1-bg  b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Orders</span>
                                            <h4 class="mb-0 counter">
                                            <?php
                                                    $sql = "SELECT count('id') FROM orders";
                                                    $result = $conn->query($sql);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="shopping-bag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0  card o-hidden">
                                <div class=" custome-1-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Pending Orders</span>
                                            <h4 class="mb-0 counter">
                                                <?php
                                                    $sql = "SELECT count('id') FROM orders WHERE payment_status = 0";
                                                    $result = $conn->query($sql);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class=" custome-1-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Earnings</span>
                                            <h4 class="mb-0 counter">
                                                <?php
                                                    $result = mysqli_query($conn, 'SELECT SUM(total_price) AS value_sum FROM orders');
                                                    $row = mysqli_fetch_assoc($result);
                                                    $sum = $row['value_sum'];

                                                    echo number_format($sum);
                                                ?>
                                            </h4>                                            
                                        </div>
                                        <div class="align-self-center text-center">
                                            <span style="font-size:25px; color:#977767;">&#8358;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chart caard section End -->                                               
                    </div>
                </div>
                <!-- Container-fluid Ends-->
                
            </div>
            <!-- index body end -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

    <!-- Footer start -->
        <?php include('footer.php')    ;?>
    <!-- Footer end -->
</body>

</html>