<?php
    session_start();
    include('db-conn.php');

    if(isset($_POST['login_btn']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $login_query_run = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $fullname = $userdata['fullname'];
            $email = $userdata['email'];
            $fullname = $userdata['fullname'];
            
            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $fullname,
                'email' => $email 
            ];

            header("Location: ../index.php");
            
        }
        else
        {
            $_SESSION['message'] = "Invalid Details";
            header("Location: ../log-in.php");
        }
    }

?>