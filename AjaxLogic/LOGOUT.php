<?php
// Start or resume the session
session_start();
ob_start();

    if (isset($_SESSION["USERID"]) || isset($_SESSION["ACCESS"])){
        session_destroy();
        header("Location: ../index.php");
        ob_end_flush();
        exit();

    }else{
          // If the user is not logged in, redirect to the login page
          header("Location: ../index.php");
          ob_end_flush();
          exit();
    }


?>