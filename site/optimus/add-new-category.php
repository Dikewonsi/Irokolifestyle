<?php
    session_start();
    include ("../config/db-conn.php");
    include ("myfunctions.php");    

    if (isset($_POST['submit'])) {

        $name = mysqli_escape_string($conn, $_POST['name']);        
        $description = mysqli_escape_string($conn, $_POST['description']);
        $meta_title = mysqli_escape_string($conn, $_POST['meta_title']);
        $meta_description = mysqli_escape_string($conn, $_POST['meta_description']);
        $meta_keyword = mysqli_escape_string($conn, $_POST['meta_keyword']);
        $status = mysqli_escape_string($conn, $_POST['status']);
        $popular = mysqli_escape_string($conn, $_POST['popular']);

        $image = $_FILES['image']['name'];

        $path = "../uploads";

        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_ext;

        $cat_query = "INSERT INTO category (name,description,meta_title,meta_description,meta_keywords,status,popular,image)
        VALUES('$name','$description','$meta_title','$meta_description','$meta_keyword','$status','$popular','$filename')";

        $cat_query_run = mysqli_query($conn, $cat_query);

        if ($cat_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-new-category.php", "Category Added Successfully");
        }else{
            redirect("add-new-category.php", "Category Not Added");
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
    <title>IrokoLifestyle - Add Category</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>Add Category</h5>                                
                </div>                
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

                                            <form class="theme-form theme-form-2 mega-form" action="code.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Category
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="name" type="text"
                                                                placeholder="Category Name">
                                                        </div>
                                                    </div>                                                    

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Description</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="description" type="text"
                                                                placeholder="Description">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Upload Image</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" name="image" type="file"
                                                                id="formFileMultiple">
                                                        </div>
                                                    </div>   

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Title</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_title" type="text"
                                                                placeholder="Meta Title">
                                                        </div>
                                                    </div>  

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Description</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_description" type="text"
                                                                placeholder="Meta Description">
                                                        </div>
                                                    </div>      

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Meta Keyword</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="meta_keyword" type="text"
                                                                placeholder="Meta Keyword">
                                                        </div>
                                                    </div>                                   

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="js-example-basic-single w-100" name="status">
                                                                <option disabled>Select One</option>
                                                                <option value="1">1</option>
                                                                <option value="0">0</option>                                                                
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
                                                        <button type="submit" name="add_category_btn" class="btn btn-primary me-3">Submit</button>
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
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->

       <?php include('footer.php'); ?>
</body>

</html>