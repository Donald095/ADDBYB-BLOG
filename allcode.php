<?php
session_start();

if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);

    $_SESSION['massage'] = "Logged Out Successfully.";
    header("Location: index.php");
    // exit(0);
}

?>