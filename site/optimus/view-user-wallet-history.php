<?php
    session_start();
    include ("../config/db-conn.php");

    if(isset($_GET['userid']))
    {
        $userid = $_GET['userid'];            
        
    }
    else
    {
        header("Location:index.php");
    }

    $userid = $_GET['userid'];        

    $sql = "SELECT * from users WHERE id='$userid' ";
    $result = $conn->query($sql);
    $data=mysqli_fetch_assoc($result);  
    
    $fullname = $data['fullname'];

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
    <title>IrokoLifestyle - User Wallet History</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-block package-card">
                    <div>
                        <h5>User Wallet Statement</h5>
                    </div>
                    <div class="card-order-section">
                        <ul>
                            <li>Account Owner: <?= $fullname; ?></li>                            
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

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class=" custome-1-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Wallet Balance</span>
                                            <h4 class="mb-0 counter">&#8358;
                                                <?php 
                                                    $userid = $_GET['userid'];

                                                    $sql = "SELECT * from users WHERE id='$userid' ";
                                                    $result = $conn->query($sql);
                                                    $rows=mysqli_fetch_assoc($result);  
                                                    
                                                    $userid = $rows['id'];

                                                    //Fetch All Credit
                                                    $credit_balance=0;
                                                    $sql="SELECT  sum(amount) as credit_balance  FROM wallet_transactions WHERE description ='top-up' and user_id='$userid'";
                                                    $result = $conn->query($sql);
                                                    while($row = $result->fetch_assoc()) {
                                                    
                                                    
                                                    $credit_balance= $row['credit_balance'];
                                                    
                                                    }
                                                
                                                //Fetch All Debit
                                                    $debit_balance=0;
                                                    $sql="SELECT  sum(amount) as debit_balance  FROM wallet_transactions WHERE description ='order' and user_id='$userid'";
                                                    $result = $conn->query($sql);
                                                    while($row = $result->fetch_assoc()) {
                                                    
                                                    
                                                    $debit_balance= $row['debit_balance'];
                                                    
                                                    }
                                                    
                                                    $total_balance = $credit_balance - $debit_balance;                                                                                                    
                                                    
                                                    echo number_format($total_balance);
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

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi">
                                            <table class="user-table ticket-table table table-striped">
                                                <thead>
                                                    <tr> 
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Tran Id</th>
                                                    <th scope="col">Description</th>     
                                                    <th scope="col">Transaction Type</th>               
                                                    <th scope="col">Date</th>                                                 
                                                    </tr>
                                                    <?php
                                                        $sql = "SELECT * from wallet_transactions WHERE user_id='$userid' ";
                                                        $result = $conn->query($sql);
                                                        while ($rows=mysqli_fetch_assoc($result)){
                                                        
                                                    ?>
                                                </thead>
                                                <tbody>
                                                    <tr>                                                        
                                                        <td>&#8358;<?php echo number_format($rows['amount']);?></td>                                              
                                                        <td><?php echo $rows['transaction_id']?></td>
                                                        <td><?php echo $rows['description']?></td>
                                                        <?php 
                                                            $desc = $rows['description'];

                                                            if($desc == 'top-up')
                                                            {
                                                                echo '<td class="status-close">
                                                                        <span style="color:green;">Credit</span>
                                                                    </td>';
                                                            }
                                                            else
                                                            {
                                                                echo '<td class="status-danger">
                                                                        <span style="color:red;">Debit</span>
                                                                    </td>';
                                                            }
                                                        ?>                                                       
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