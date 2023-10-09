<?php
    require("./Database.php");
    session_start();
    ob_start();
    
    if (!isset($_SESSION["USERID"]) || !isset($_SESSION["ACCESS"])){
        header("Location: ./index.php");
        ob_end_flush();
        exit;
    }


    if($_SESSION["ACCESS"] == "STUDENT"){
        include "./StudentPage.php";
    }else{
        $sqlcodeUSERDATA = "SELECT CONCAT(StaffLname,', ', StaffFname, ' ', StaffMname ) AS staffname, StaffID FROM staffinfos WHERE userID = '".$_SESSION['USERID']."';";
        $USERDATA = mysqli_query($conn,$sqlcodeUSERDATA);
        $resultUSERDATA = mysqli_fetch_assoc($USERDATA);
        $_SESSION["STAFFNAME"] = $resultUSERDATA["staffname"];
        $_SESSION["STAFFID"] = $resultUSERDATA["StaffID"];
        
        include "./AdminPage.php";
    }
?>