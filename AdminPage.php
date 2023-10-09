<?php
    $link= isset($_GET["link"]) ? $_GET["link"] :"Dashboard_ADMIN" ;
    $num =  isset($_GET["num"]) ? $_GET["num"] :"1" ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="./CSS/Table.css">
    <link rel="stylesheet" href="./CSS/Admin1.css">

    <!--SweetAlert-->
    <script src="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="./SweetAlert/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!--Jquery-->
    <script src="./Jquery/node_modules/jquery/dist/jquery.js"></script>
    <script src="./Jquery/node_modules/jquery/dist/jquery.min.js"></script>

  

    <script src="./JS/script.js"></script>
</head>
<body>

    <nav>
        <h1>CleriaElec</h1>
        <div class="imgprofile">
            
            <ul class="dropdown">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                    <ul class="submenu">
                        <li class="specialSMli">
                            <p>
                                <?php
                                    echo $_SESSION["STAFFNAME"];
                                ?>
                            </p>
                            
                        </li>
                        <li onclick="NORETURN(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                            <a href="ggogle.com">Settings</a>
                        </li>
                        <li onclick="NORETURN(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
                            <a href="./AjaxLogic/LOGOUT.php" >Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    
    </nav>

    <main>
       
        <section class="sidebar">
            <ul>
                <li onclick="NORETURN(this)" class="<?php if($num == "1") {echo "LIACTIVATE";}?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                    <a href="./Mainpage.php?link=Dashboard_ADMIN&num=1">Dashboard</a>
                </li>

                <div class="dropdownlist1">
                    <li onclick="NORETURN(this)" class="<?php if($num == "2") {echo "LIACTIVATE";}?>">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg>

                        <a href="./Mainpage.php?link=ListClass_ADMIN&num=2">List of Class</a>
                    </li>
                    <li onclick="NORETURN(this)" class="<?php if($num == "3") {echo "LIACTIVATE";}?>">
                    
                        <!-- Generator: Adobe Illustrator 22.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg fill="#1C2033" width="16" height="16" version="1.1" id="lni_lni-users" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                        <g>
                            <path d="M21.8,36.8c6.9,0,12.4-5.6,12.4-12.4s-5.6-12.4-12.4-12.4S9.4,17.5,9.4,24.4S15,36.8,21.8,36.8z M21.8,16.4
                                c4.4,0,7.9,3.6,7.9,7.9s-3.6,7.9-7.9,7.9c-4.4,0-7.9-3.6-7.9-7.9S17.4,16.4,21.8,16.4z"/>
                            <path d="M21.8,39.9c-7.2,0-14.1,2.9-19.4,8.3c-0.9,0.9-0.9,2.3,0,3.2c0.4,0.4,1,0.7,1.6,0.7c0.6,0,1.2-0.2,1.6-0.7
                                c4.4-4.5,10.2-7,16.2-7c5.9,0,11.7,2.5,16.2,7c0.9,0.9,2.3,0.9,3.2,0c0.9-0.9,0.9-2.3,0-3.2C35.9,42.9,29,39.9,21.8,39.9z"/>
                            <path d="M47.3,36.8c4,0,7.3-3.3,7.3-7.3c0-4-3.3-7.3-7.3-7.3s-7.3,3.3-7.3,7.3C39.9,33.5,43.2,36.8,47.3,36.8z M47.3,26.6
                                c1.6,0,2.8,1.3,2.8,2.8c0,1.6-1.3,2.8-2.8,2.8s-2.8-1.3-2.8-2.8C44.4,27.9,45.7,26.6,47.3,26.6z"/>
                            <path d="M61.5,45.6c-5.3-4.9-12.6-6.9-19.9-5c-1.2,0.3-1.9,1.5-1.6,2.7c0.3,1.2,1.6,1.9,2.7,1.6c5.8-1.5,11.6,0,15.7,3.9
                                c0.4,0.4,1,0.6,1.5,0.6c0.6,0,1.2-0.2,1.6-0.7C62.5,47.9,62.4,46.5,61.5,45.6z"/>
                        </g>
                        </svg>

                        <a href="./Mainpage.php?link=ListStudent_ADMIN&num=3">Manage Student</a>
                    </li>
                    <li onclick="NORETURN(this)" class="<?php if($num == "4") {echo "LIACTIVATE";}?>">
                    
                        <!-- Generator: Adobe Illustrator 22.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg fill="#1C2033" width="16" height="16" version="1.1" id="lni_lni-stats-up" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                        <g>
                            <path d="M60,57.8H6.3V4c0-1.2-1-2.3-2.3-2.3S1.8,2.8,1.8,4v54.1c0,2.3,1.9,4.2,4.2,4.2H60c1.2,0,2.3-1,2.3-2.3S61.2,57.8,60,57.8z"
                                />
                            <path d="M59,22.1H47.3c-1.2,0-2.3,1-2.3,2.3s1,2.3,2.3,2.3h6.8l-5.3,4.6H35.7c-0.7,0-1.4,0.3-1.8,0.9l-7.1,9.3H16.3
                                c-1.2,0-2.3,1-2.3,2.3s1,2.3,2.3,2.3h11.6c0.7,0,1.4-0.3,1.8-0.9l7.1-9.3h12.9c0.5,0,1.1-0.2,1.5-0.6l6.6-5.8v7.7
                                c0,1.2,1,2.3,2.3,2.3s2.3-1,2.3-2.3V25.3C62.3,23.6,60.8,22.1,59,22.1z"/>
                        </g>
                        </svg>

                        <a href="./Mainpage.php?link=ListStudentReport_ADMIN&num=4">Student Report</a>
                    </li>
                 
                </div>
                <li onclick="NORETURN(this)" class="<?php if($num == "5") {echo "LIACTIVATE";}?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM128 256a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM80 432c0-44.2 35.8-80 80-80h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16z"/></svg>
                    <a href="./Mainpage.php?link=ListStaff_ADMIN&num=5">Manage Staffs</a>
                </li>
            </ul>
        </section>
        <section class="mainbody">
            <?php
                include "$link.php";
                //include "ListClass_ADMIN.php";ListStudentReport_ADMIN
                //include "ListStaff_ADMIN.php";

            ?>


   
        </section>

    </main>

    <script>
        function NORETURN(e){
             // Get the <a> tag element inside the clicked <li>
            const anchorElement = e.querySelector('a');
            
            // Check if the <a> tag element exists
            if (anchorElement) {
                // Trigger a click event on the <a> tag
                anchorElement.click();
            }
        }
    </script>

</body>
</html>
