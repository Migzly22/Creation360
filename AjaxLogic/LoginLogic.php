
<?php
    require("../Database.php");
    session_start();
    ob_start();


      $sqlcode = $_POST["sqlcode"];

      $result = mysqli_query($conn,$sqlcode);
      
      if (mysqli_num_rows($result) >0) {

        echo "
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Logged in successfully'
          })
        " ;

        $resultvalue = mysqli_fetch_assoc($result);

        $_SESSION["ACCESS"] = $resultvalue["Access"];
        $_SESSION["USERID"]= $resultvalue["ID"];
       
        //header("Location: ./Mainbody.php");
        //ob_end_flush();
        //exit();

      }else{

        $textfooter = "./ResetPass.php";
        echo "
          Swal.fire({
            icon: 'error',
            text: 'Wrong User Credentials. Please Try Again',
            footer: '<a href=".$textfooter.">Forgot Password ?</a>'
          })
        " ;

      }

?>
