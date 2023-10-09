<?php
  require("./Database.php");
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" href="./CSS/Login1.css">

    <!--SweetAlert-->
    <script src="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!--Jquery-->
    <script src="./Jquery/node_modules/jquery/dist/jquery.js"></script>
    <script src="./Jquery/node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>

<?php
  if(isset($_POST['SignupBtn'])){
      $fname = $_POST["fname"];
      $mname = $_POST["mname"];
      $lname = $_POST["lname"];
      $studnum = $_POST["studnum"];
      $YrSec = $_POST["YrSec"];
      $clcode = $_POST["clcode"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $cpassword = $_POST["cpassword"];

      $sqlcode = "SELECT * FROM user_accounts WHERE Email = '$email';";
      $runquery = mysqli_query($conn,$sqlcode);

      $sqlcode1 = "SELECT * FROM classverification WHERE 	Class_Number = '$clcode';";
      $queryclasscode = mysqli_query($conn,$sqlcode1);

      $sqlcode2 = "SELECT * FROM student_information WHERE Student_ID = '$studnum';";
      $runquery2 = mysqli_query($conn,$sqlcode);

      if(mysqli_num_rows($runquery) > 0){
        echo "<script>
          Swal.fire({
            icon: 'error',
            text: 'Email Already Exist',
          })
          </script>" ;
      }else if ($password != $cpassword){
        echo "<script>
        Swal.fire({
          icon: 'error',
          text: 'Password Doesnt Match',
        })
        </script>" ;
      }else if(mysqli_num_rows($queryclasscode) == null){
        echo "<script>
        Swal.fire({
          icon: 'error',
          text: 'Class Code Doesnt Match',
        })
        </script>" ;
      }else if(strlen($password) < 8 && strlen($cpassword) <8){
        echo "<script>
        Swal.fire({
          icon: 'info',
          text: 'Password length should be at least 8 characters',
        })
        </script>" ;
      }else if(mysqli_num_rows($runquery2) > 0){
        echo "<script>
        Swal.fire({
          icon: 'info',
          text: 'Student number already exist',
        })
        </script>" ;
      }else{
        $inputcode = "INSERT INTO `user_accounts` (`User_ID`, `Email`, `Password`) VALUES (NULL, '$email', '$password');";
        mysqli_query($conn,$inputcode);

        $sqlcode3 = "SELECT * FROM user_accounts WHERE Email = '$email' AND Password = '$password';";
        $queryrun = mysqli_query($conn,$sqlcode3);
        $result = mysqli_fetch_assoc($queryrun)["User_ID"];

        $inputcode = "INSERT INTO `student_information` (`Student_ID`, `Fname`, `Mname`, `Lname`, `Section`, `User_ID`, `Class_code`) 
                      VALUES ('$studnum', '$fname', '$mname', '$lname', '$YrSec', '$result', '$clcode');";
        mysqli_query($conn,$inputcode);


        echo "<script>
        Swal.fire({
          icon: 'success',
          title:'Registered Successfully',
          text: 'Please go to Login Form to logged in your credentials',
        })
        </script>" ;
      }


  }
?>

    <section class="specials123">
        <form class="form" method="post">
            <header>
              <h1 class="text-center">Registration</h1>
            </header>
            <div class="levels-3">
              <div class="form-group">
                <input type="text" name="fname" required>
                <label for="fname">First Name</label>
              </div>
              <div class="form-group">
                <input type="text" name="mname" required>
                <label for="mname">Middle Name</label>
              </div>
              <div class="form-group">
                <input type="text" name="lname" required>
                <label for="lname">Surname</label>
              </div>
            </div>
            <div class="levels-2">
              <div class="form-group">
                <input type="text" name="studnum" required>
                <label for="studnum">Student Number</label>
              </div>
              <div class="form-group">
                <input type="text" name="YrSec" required>
                <label for="YrSec">Year & Section (EX: BSHM-1A)</label>
              </div>
            </div>
            <div class="levels">
              <div class="form-group">
                <input type="text" name="clcode" required>
                <label for="clcode">Class Code</label>
              </div>
            </div>
            <div class="levels">
              <div class="form-group">
                <input type="text" name="email" required>
                <label for="email">Email address</label>
              </div>
            </div>
            <div class="levels-2">
              <div class="form-group">
                <input type="password" name="password" required>
                <label for="password">Password</label>
              </div>
              <div class="form-group">
                <input type="password" name="cpassword" required>
                <label for="cpassword">Confirm Password</label>
              </div>
            </div>
            <button type="submit" name="SignupBtn">Continue</button>
            <p class="text-center">Already have an account? 
              <a class="link" href="./index.php">Sign in</a>    
            </p>
        </form>
    </section>

      
</body>
</html>