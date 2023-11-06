<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Blood_Consumer_login_form/Consumer_LoginForm.php");
?>