<?php
    session_start();
    include ("../config/db-conn.php");
    include ("myfunctions.php");
    $msg = array();
        

    if (isset($_POST['edit'])) {

        $id = mysqli_escape_string($conn, $_POST['id']);   
        $name = mysqli_escape_string($conn, $_POST['name']);        
        $description = mysqli_escape_string($conn, $_POST['description']);
        $meta_title = mysqli_escape_string($conn, $_POST['meta_title']);
        $meta_description = mysqli_escape_string($conn, $_POST['meta_description']);
        $meta_keyword = mysqli_escape_string($conn, $_POST['meta_keyword']);
        $status = 1;
        $popular = mysqli_escape_string($conn, $_POST['popular']);  

        $new_image = $_FILES['image']['name'];
        $old_image = $_POST['old_image'];

        if ($new_image != "")
        {
            $update_filename = $new_image;  
            
        }
        else
        {
            $update_filename = $old_image;
        }

        $path = "../uploads";
        
        $update_query=" UPDATE category SET name='$name', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keyword', status='$status', popular='$popular', image='$update_filename' WHERE id ='$id'  ";        

        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run)
        {
            if($_FILES['image']['name'] != "")
            {
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
                if(file_exists("../uploads/".$old_image))
                {
                    unlink("../uploads/".$old_image);
                }
            }
            redirect("edit-category.php?id=$id", "Category Updated Successfully");
        }
        else
        {
            redirect("edit-category.php?id=$id", "Category Not Updated Successfully");
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
    <title>IrokoLifestyle - Edit Category</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>Edit Category</h5>                                
                </div>                
                <?php 
                    if (isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                        $category = getByID("category", $id);

                        if (mysqli_num_rows($category) > 0)
                        {
                            $data = mysqli_fetch_array($category);
                                                            
                ?>
                <!-- New Category Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Category Information</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Category
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="name" type="text"
                                                                value="<?php echo $data['name']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">                                                        
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="id" type="hidden"
                                                                value="<?php echo $data['id']; ?>">
                                                        </div>
                                                    </div>                                                    

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Description</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="description" type="text"
                                                                value="<?php echo $data['description']; ?>">
                                                        </div>
                                                    </div>   

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Update Image</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" name="image" type="file"
                                                                id="formFileMultiple">                                                            
                                                        </div>                                                        
                                                        <label class="col-sm-2 col-form-label form-label-title">Current Image</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" name="old_image" value="<?= $data['image']?>">
                                                            <img style="width:50px; height:50px;" src="../uploads/<?php echo $data['image']; ?>">
                                                        </div>
                                                    </div>                                                                                           

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Title</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_title" type="text"
                                                               value="<?php echo $data['meta_title']; ?>">
                                                        </div>
                                                    </div>  

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Description</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_description" type="text"
                                                                value="<?php echo $data['meta_description']; ?>">
                                                        </div>
                                                    </div>      

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Keyword</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_keyword" type="text"
                                                                value="<?php echo $data['meta_keywords']; ?>">
                                                        </div>
                                                    </div>                                   

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="js-example-basic-single w-100" name="status">
                                                                <option disabled>Select One</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Popular</label>
                                                        <div class="col-sm-10">
                                                            <select class="js-example-basic-single w-100" name="popular">
                                                                <option disabled>Select One</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-end border-0 pt-0">
                                                        <button type="submit" name="edit" class="btn btn-primary me-3">Submit</button>
                                                        <a href="index.php" class="btn btn-outline-primary">Cancel</a>
                                                    </div>
                                                </div>                                                
                                            </form>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Category Add End -->
            <?php
                    }
                    else
                    {
                        echo "Category not found";
                    }                        
                }
                else
                {
                    echo "Category ID missing";
                }
            ?>
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->

       <?php include('footer.php'); ?>
</body>

</html>