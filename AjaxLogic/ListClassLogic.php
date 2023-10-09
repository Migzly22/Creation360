<?php
    require("../Database.php");
    session_start();
    ob_start();

    $sqlcode = $_POST["sqlcode"];
    $state = $_POST["State"];


    function showtabledata($conn){
        $sqlcode = "SELECT a.*, CONCAT(b.StaffLname,', ', b.StaffFname, ' ', b.StaffMname ) AS staffname FROM classes a LEFT JOIN staffinfos b ON a.staffID = b.StaffID ORDER BY a.ClassID DESC;";
        $queryrun = mysqli_query($conn,$sqlcode);
        $divbox = "";

        while ($result = mysqli_fetch_assoc($queryrun)){
            $divbox .="
                <div class='box' id='".$result['ClassID']."' onclick='boxclick(this)'>
                    <div class='boxboxlimitt'>
                        <h3>".$result['classTitle']."</h3>
                        <div class='ClassDescription'>
                            <p style='font-style:italic;'>
                                by : ".$result['staffname']."
                            </p>
                            <small>
                                ".$result['classDescription']."
                            </small>
                        </div>
                    </div>
                    <div class='ClassCODEID'>
                        <code>
                            ".$result['ClassID']."
                            <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 384 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z'/></svg>
                        </code>
                    </div>
                    
                </div>
            ";

        }

        echo $divbox;
    }


    switch ($state) {
        case 'Deletion':
            //Deletion part
                mysqli_query($conn,$sqlcode);

            //Printing part
                showtabledata($conn);
            break;
        case 'Insertion':
            //Insertion on users table part
                mysqli_query($conn,$sqlcode);

            //Printing part
                showtabledata($conn);
            break;

    }