         <!--Student Reports-->
        <div class="mainbodycontainer">
                <div class="classHeader">
                    <h1>Student Reports</h1>
                </div>
                <div class="SRbox">

<?php
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
                
            </div>
        ";

    }

    echo $divbox;

?>
                    <div class="box">
                        <div class="boxboxlimitt">
                            <h3>Title of the Subject</h3>
                            <div class="ClassDescription">
                                <p style='font-style:italic;'>
                                    by : ".$result['staffname']."
                                </p>
                                <small>
                                    ".$result['classDescription']."
                                </small>
                            </div>
                        </div>

                    </div>
                   
                </div>
                

        </div>