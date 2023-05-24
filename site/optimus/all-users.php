<?php
    session_start();
    include ("../config/db-conn.php");
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
    <title>IrokoLifestyle - All User</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>All Users</h5>                                
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Registered</th>
                                                        <th>Options</th>
                                                    </tr>
                                                    <?php
                                                        $sql = "SELECT * from users";
                                                        $result = $conn->query($sql);
                                                        while ($rows=mysqli_fetch_assoc($result)){
                                                        
                                                    ?>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $rows['id']?></td>                                              
                                                        <td><?php echo $rows['fullname']?></td>
                                                        <td><?php echo $rows['email']?></td>
                                                        <td><?php echo $rows['phone']?></td>
                                                        <td><?php 
                                                                if ($rows['status'] == 'verified') {
                                                                    // code...
                                                                    echo "<span class='order-success'>verified</span>";
                                                                }else{
                                                                    echo "<span class='order-success'>not verified</span>";
                                                                }
                                                            ?>                                                    
                                                        </td>

                                                        <td><?php echo $rows['created_at'];?></td>

                                                        <td>
                                                            <ul>                                                                
                                                                <li>
                                                                    <a href="edit-user.php?id= <?php echo $rows["id"]; ?>">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="delete-user.php?id= <?php echo $rows["id"]; ?>">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
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