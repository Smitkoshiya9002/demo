<?php
session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    // unset($_SESSION['logged_in']);

    echo '<script>alert("logout successfully!");</script>';
    echo "<script> location.href='home.php' </script>";
}else{
    unset($_SESSION['admin']);

    echo '<script>alert("logout admin!");</script>';
    echo "<script> location.href='login.php' </script>";
}

?>