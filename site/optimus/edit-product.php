<?php
    session_start();
    include ("../config/db-conn.php");
    include("myfunctions.php");
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
    <title>IrokoLifestyle - Edit Product</title>

    <?php include('header.php'); ?>

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>Edit Product</h5>                                
                </div>                
                <!-- New Category Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <?php 
                                    if (isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];
                                        
                                        $product = getByID("products",$id);  

                                        if (mysqli_num_rows($product) > 0)                                            
                                        {
                                            $data = mysqli_fetch_array($product)
                                        ?>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-header-2">
                                                            <h5>Product Information</h5>
                                                        </div>

                                                        <form class="theme-form theme-form-2 mega-form" action="code.php" method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="form-label-title col-sm-2 mb-0">Category</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="js-example-basic-single w-100" name="category_id">
                                                                            <option selected>Select Category</option>
                                                                            <?php
                                                                                $category = getAll("category");

                                                                                if (mysqli_num_rows($category) > 0)
                                                                                {
                                                                                    foreach ($category as $item)
                                                                                    {
                                                                                        ?>
                                                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':''?> ><?= $item['name'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                                
                                                                <input class="form-control" name="id" value="<?= $data['id']; ?>" type="hidden"
                                                                    placeholder="Product Name">                                         
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="form-label-title col-sm-2 mb-0">Product Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name="name" value="<?= $data['name']; ?>" type="text"
                                                                            placeholder="Product Name">
                                                                    </div>
                                                                </div>                                                    
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="form-label-title col-sm-2 mb-0">Description</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name="description" value="<?= $data['description']; ?>" type="text"
                                                                            placeholder="Product Description">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="form-label-title col-sm-2 mb-0">Price</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name="price" value="<?= $data['price']; ?>" type="number"
                                                                            placeholder="Price">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4 row align-items-center">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-label-title">Upload Image</label>
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
                                                                    <label class="form-label-title col-sm-2 mb-0">Quantity</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name="qty" value="<?= $data['qty']; ?>" type="number"
                                                                            placeholder="Available Quantity">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="form-label-title col-sm-2 mb-0">Status</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name="status" value="<?= $data['status']; ?>" type="number"
                                                                            placeholder="Product Status">
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer text-end border-0 pt-0">
                                                                    <button type="submit" name="update_product_btn" class="btn btn-primary me-3">Update</button>
                                                                    <a href="index.php" class="btn btn-outline-primary">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>                                    
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            echo "Product Not found for given ID in url";
                                        }                                   
                                                                
                                    }
                                    else
                                    {
                                        echo "ID is Missing from url";
                                    }
                                ?>
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