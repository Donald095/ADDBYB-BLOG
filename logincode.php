<?php
session_start();
include('admin/config/db_con.php');

if (isset($_POST['login_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE username='$name' AND password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data){
            $user_id = $data['id'];
            $user_name = $data['name'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
            $status = $data['status'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id, 
            'user_name' => $user_name, 
            'user_email' => $user_email, 
            'role_as' => $role_as, 
        ];
        if( $_SESSION['auth_role'] == '1') // 1 = Admin
        { 
            $_SESSION["massage"] = "Welcome to Dashboard";
            header("Location: admin/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '0')   // 0 = User
        {
            $_SESSION["massage-home"] = "You are Logged In.";
            header("Location: index.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION["massage"] = "Invalid Username or Password..!";
        header("Location: login.php");
        exit(0);
    }
}
else
{
    $_SESSION["massage"] = "You are not allowed to access this file..!";
    header("Location: login.php");
    exit(0);
}

?>
