<?php
    session_start();
    include ("../config/db-conn.php");
    include("myfunctions.php");

    if (isset($_POST['delete'])) {
        $id = mysqli_escape_string($conn, $_POST['id']); 

        $category_query = "SELECT * FROM category WHERE id = '$id' ";
        $category_query_run = mysqli_query($conn, $category_query);
        $category_data = mysqli_fetch_array($category_query_run);
        $image = $category_data['image'];

        $delete_query = "DELETE FROM category WHERE id = '$id' ";
        $delete_query_run = mysqli_query($conn, $delete_query);

        if ($delete_query)
        {
            if (file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }

            redirect("category.php", "Category Has Been Deleted");      
        }
        else
        {
            redirect("category.php", "Something went wrong");
        }
    }
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
    <title>IrokoLifestyle - All Category</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>All Category</h5>                                
                </div>                        
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi table-product">
                                            <table class="table table-1d all-package">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Category Name</th>
                                                        <th>Description</th>                                                        
                                                        <th>Image</th>
                                                        <th>Options</th>
                                                    </tr>
                                                    <?php
                                                        $category = getAll("category");
                                                        if (mysqli_num_rows($category) > 0)
                                                        {
                                                           foreach($category as $item)
                                                            {
                                                        
                                                    ?>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td><?= $item['id']?></td>

                                                        <td><?= $item['name']?></td>

                                                        <td><?= $item['description']?></td>
                                                        

                                                        <td><img src="../uploads/<?= $item['image']?>" style="width:50px; height:50px;" class="img-fluid"
                                                                alt=""></td>

                                                        <td>
                                                            <ul>                                                                
                                                                <li>
                                                                    <a href="edit-category.php?id= <?= $item["id"]; ?>">
                                                                        <span class="lnr lnr-pencil"></span>
                                                                    </a>
                                                                </li>
                                                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                <li>
                                                                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                                    <button type="submit" name="delete">
                                                                        <i class="far fa-trash-alt theme-color"></i>
                                                                    </button>
                                                                </li>
                                                            </form>
                                                            </ul>
                                                        </td>
                                                    </tr>   
                                                    <?php
                                                        }

                                                    }
                                                    else
                                                    {
                                                        echo "No records Found";
                                                    }
                                                    ?>                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
        </div>
        <!-- Page Body End -->

       <?php include('footer.php'); ?>
</body>

</html>