<?php
  require("./Database.php");

  session_start();
  ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./CSS/Login1.css">

    <!--SweetAlert-->
    <script src="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!--Jquery-->
    <script src="./Jquery/node_modules/jquery/dist/jquery.js"></script>
    <script src="./Jquery/node_modules/jquery/dist/jquery.min.js"></script>

  

    <script src="./JS/script.js"></script>

</head>
<body>


    <section class="specials123">
        <form class="form" method="post">
            <header>
              <h1 class="text-center">Login</h1>
            </header>
            <div class="form-group">
              <input type="text" name="email"   id ="email" required>
              <label for="email">Email address</label>
            </div>
            <div class="form-group">
              <input type="password" name="password"  id="password" required>
              <label for="password">Password</label>
            </div>
            <p><a class="link" href="./ResetPass.php">Forgot password?</a></p>
            <button type="button" name="Loginbtn" id="Loginbtn">Continue</button>
            <p class="text-center">Don't have an account? 
              <a class="link" href="./Registration.php">Sign up</a>    
            </p>
        </form>
    </section>


    </div>
    <script>
        var counter = 0;

        const Loginbtn = document.getElementById("Loginbtn");
        Loginbtn.addEventListener("click",async (e)=>{

          if(counter !==0){
            return false
          }
          counter++;

          const email = document.getElementById("email").value;
          const password = document.getElementById("password").value;
          
          if(email === "" || password === ""){
            SweetError();
            return true;
          }

          e.preventDefault();

          //sqlcode
          let sqlcode = `SELECT * FROM users WHERE Email = '${email}' AND Password = '${password}';`
          //call for AjaxsSendv3
          let throwns = await AjaxSendv3(sqlcode,"LoginLogic","")

          const Alerts = document.getElementById("Alerts")

          await eval(throwns)//run the code expression

          if(throwns.includes("icon: 'success'")){
            location.href  = "./Mainpage.php";
          }
        })

    </script>
      
</body>
</html>