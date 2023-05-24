<?php
    session_start();
    include ("../config/db-conn.php");

    $track_no = $_GET['trackNum'];    
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="IrokoLifestyle admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, IrokoLifestyle admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>IrokoLifestyle - Wallet Transaction</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-block package-card">
                    <div>
                        <h5>Wallet Transaction Details</h5>
                    </div>
                    <div class="card-order-section">
                        <ul>
                            <li>Tracking No: <?= $track_no;?></li>                            
                        </ul>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['msg'])) 
                    echo $_GET['msg'];  
                ?>
                <!-- All User Table Start -->
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi">
                                            <table class="user-table table table-striped">
                                                <thead>
                                                    <tr> 
                                                        <th>Userid</th> 
                                                        <th>Fullname</th>                                                      
                                                        <th>Amount</th>
                                                        <th>Transaction ID</th>
                                                        <th>Description</th>     
                                                        <th>Date</th>                                                  
                                                    </tr>
                                                    <?php
                                                        $sql = "SELECT * from wallet_transactions WHERE tracking_no = '$track_no' ";
                                                        $result = $conn->query($sql);
                                                        while ($rows=mysqli_fetch_assoc($result)){
                                                        
                                                    ?>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $rows['id']?></td>
                                                        <td>
                                                            <?php 
                                                                $userid = $rows['user_id'];
                                                                $query = "SELECT * FROM users WHERE id = '$userid' ";
                                                                $result = $conn->query($query);
                                                                while ($datas=mysqli_fetch_assoc($result))
                                                                {
                                                                    $fullname = $datas['fullname'];
                                                                }
                                                                echo $fullname;
                                                            ?>
                                                        </td>  
                                                        <td>&#8358;<?php echo $rows['amount']?></td>                                              
                                                        <td><?php echo $rows['transaction_id']?></td>
                                                        <td><?php echo $rows['description']?></td>                                                        
                                                        <td><?php echo $rows['created_at'];?></td>                                                                                                                
                                                        <?php
                                                            }
                                                        ?>
                                                    </tr>                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All User Table Ends-->
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->

       <?php include('footer.php'); ?>
</body>

</html>