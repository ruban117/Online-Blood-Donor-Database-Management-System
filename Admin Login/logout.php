<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Admin Login/Admin_login.php");
?>