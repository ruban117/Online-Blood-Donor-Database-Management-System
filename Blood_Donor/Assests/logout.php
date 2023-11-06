<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../BLOOD DONOR LOGIN FORM/Donor_LoginForm.php");
?>