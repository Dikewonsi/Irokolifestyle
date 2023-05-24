<?php

    session_start();
    include ("../config/db-conn.php");
    include ("myfunctions.php");    

    if (isset($_POST['add_category_btn']))
    {

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

        if ($cat_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-new-category.php", "Category Added Successfully");
        }else{
            redirect("add-new-category.php", "Category Not Added");
        }

    }

    else if (isset($_POST['add_product_btn'])) 
    {
       $category_id = $_POST['category_id'];
       $name = $_POST['name'];
       $description = $_POST['description'];
       $price = $_POST['price'];
       $qty = $_POST['qty'];
       $status = $_POST['status'];

       $image = $_FILES['image']['name'];

       $path = "../uploads";

       $image_ext = pathinfo($image, PATHINFO_EXTENSION);
       $filename = time().'.'.$image_ext;

       $product_query = "INSERT INTO products (category_id,name,description,price,image,qty,status)
       VALUES('$category_id','$name','$description','$price','$filename','$qty','$status')";

       $product_query_run = mysqli_query($conn, $product_query);

       if ($product_query_run)
       {
           move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

           redirect("add-new-product.php", "Product Added Successfully");
       }
       else
       {
            redirect("add-new-product.php", "Something went wrong");
       }
    }

    else if (isset($_POST['delete_product_btn']))
        {
            $id = mysqli_escape_string($conn, $_POST['id']); 

            $product_query = "SELECT * FROM products WHERE id = '$id' ";
            $product_query_run = mysqli_query($conn, $product_query);
            $product_data = mysqli_fetch_array($product_query_run);
            $image = $product_data['image'];

            $delete_query = "DELETE FROM products WHERE id = '$id' ";
            $delete_query_run = mysqli_query($conn, $delete_query);

            if ($delete_query)
            {
                if (file_exists("../uploads/".$image))
                {
                    unlink("../uploads/".$image);
                }

                redirect("products.php", "Product Has Been Deleted");      
            }
            else
            {
                redirect("products.php", "Something went wrong");
            }
        }

    else if (isset($_POST['update_product_btn']))
        {   
            $product_id = $_POST['id'];
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $status = $_POST['status'];           

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
            
            $update_product_query=" UPDATE products SET category_id='$category_id', name='$name', description='$description', price='$price', qty='$qty', status='$status', image='$update_filename' WHERE id ='$product_id'  ";        

            $update_product_query_run = mysqli_query($conn, $update_product_query);

            if ($update_product_query_run)
            {
                if($_FILES['image']['name'] != "")
                {
                    move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
                    if(file_exists("../uploads/".$old_image))
                    {
                        unlink("../uploads/".$old_image);
                    }
                }
                redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
            }
            else
            {
                redirect("edit-product.php?id=$product_id", "Prodcut Not Updated Successfully");
            }
        }

    else if (isset($_POST['update_admin_btn']))
        {   
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];                       
            
            $update_admin_query=" UPDATE admin SET username='$username', password='$password' WHERE id ='$id'  ";        

            $update_admin_query_run = mysqli_query($conn, $update_admin_query);

            if ($update_admin_query_run)
            {                
                redirect("profile-setting.php?id=$id", "Admin Details Updated Successfully");
            }
            else
            {
                redirect("edit-product.php?id=$id", "Prodcut Not Updated Successfully");
            }
        }
    else if (isset($_POST['trackOrderBtn']))
        {   
            $trackingNum = $_POST['trackingNo'];                       
            
            $track_query=" SELECT * FROM orders WHERE tracking_no = '$trackingNum' ";        

            $track_query_run = mysqli_query($conn, $track_query);
            $order_data = mysqli_fetch_array($track_query_run);

            if (mysqli_num_rows($track_query_run) > 0)
            {                
                $payment_id = $order_data['payment_id'];
                
                redirect("view-order.php?payID=$payment_id", "Here is your Order");
            }
            else
            {
                redirect("order-tracking.php", "Wrong Tracking Number. Try Again.");
            }
        }


    else if (isset($_POST['editShipBtn']))
        {
            $status = $_POST['status'];    
            $payment_id = $_POST['payment_id'];                             
            
            $update_order_query=" UPDATE orders SET ship_status='$status' WHERE payment_id ='$payment_id'  ";        

            $update_order_query_run = mysqli_query($conn, $update_order_query);

            if ($update_order_query_run)
            {                
                redirect("view-order.php?payID=$payment_id", "Shipment Status Edited Successfully");
            }
            else
            {
                redirect("view-order.php?payID=$payment_id", "Something Went Wrong");
            }
        }

    else if (isset($_POST['trackWalletBtn']))
        {
            $trackingNum = $_POST['trackingNo'];                       
            
            $track_query=" SELECT * FROM wallet_transactions WHERE tracking_no = '$trackingNum' ";        

            $track_query_run = mysqli_query($conn, $track_query);
            $order_data = mysqli_fetch_array($track_query_run);

            if (mysqli_num_rows($track_query_run) > 0)
            {                                                
                redirect("wallet-tran-details.php?trackNum=$trackingNum", "Here is the Transaction");
            }
            else
            {
                redirect("track-wallet-transaction.php", "Wrong Tracking Number. Try Again.");
            }
        }

    else
    {
        header("location: index.php");
    }

 ?>