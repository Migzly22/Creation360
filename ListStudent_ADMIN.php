     <!--Manage Students-->
     <div class="mainbodycontainer">
                <div class="classHeader">
                    <h1>Students</h1>
                </div>
                <div class="stafflistbox">
                    <div class="box">
                        <h2>List of Enrolled Students</h2>
                        <div class="box2">
                            <table class="table" style="border-collapse: collapse;">
                           
                                <thead>
                                    <tr>
                                        <th scope="col">Student #</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" style="text-align: center;">Phone #</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
<?php

    $sqlcode = ($_SESSION["ACCESS"] == "ADMIN") ?  
        "SELECT a.*, CONCAT(a.Lastname,', ', a.Firstname, ' ', a.Middlename ) AS studentname, b.* FROM studentinfos a LEFT JOIN users b ON a.usersID = b.ID ORDER BY CONCAT(a.Lastname,', ', a.Firstname, ' ', a.Middlename );"
        :
        "SELECT e.*,CONCAT(c.Lastname,', ', c.Firstname, ' ', c.Middlename ) AS studentname, b.*, c.* FROM studentclassesenrolled a LEFT JOIN classes b ON b.ClassID = a.classID 
        LEFT JOIN studentinfos c ON a.student_ID = c.StudentID
        LEFT JOIN users e ON c.usersID = e.ID
        LEFT JOIN staffinfos d ON d.StaffID = b.staffID
        WHERE d.StaffID = '9' ORDER BY CONCAT(c.Lastname,', ', c.Firstname, ' ', c.Middlename );";


    //$sqlcode = "SELECT a.*, CONCAT(a.Lastname,', ', a.Firstname, ' ', a.Middlename ) AS studentname, b.* FROM studentinfos a LEFT JOIN users b ON a.usersID = b.ID ORDER BY StudentID;";
    $queryrun = mysqli_query($conn,$sqlcode);
    $tabledata = "";

    while ($result = mysqli_fetch_assoc($queryrun)){
        $tabledata .= "
            <tr>
                <td>".$result["StudentID"]."</td>
                <td>".$result["studentname"]."</td>
                <td style='text-align: center;'>".$result["Phonenumber"]."</td>
                <td>".$result["Email"]."</td>
                <td class='ActionTABLE' id='".$result["ID"]."'>
                    <button class='addbtn'>
                        <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'/></svg>
                    </button>
                    <button class='Editbtn'>
                        <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z'/></svg>
                    </button>
                    <button class='Deletebtn' onclick='DELETIONBTN(this)'>
                        <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg>
                    </button>
                </td>
            </tr>
        ";

    }

    echo $tabledata;
?>

                                    


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


<script>
    const tbody = document.getElementById('tbody')


     async function DELETIONBTN(e) {
        let targetid = e.parentNode.id
        let targetname = e.parentNode.parentNode.cells[1].innerHTML


        console.log(targetid)
        Swal.fire({
            title: `Do you want to delete user ${targetname}?`,
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then(async (result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {

                let sqlcode = `DELETE FROM users WHERE ID ='${targetid}';;`
                //call for AjaxsSendv3
                let throwns = await AjaxSendv3(sqlcode,"ListStudentLogic","&State=Deletion")
                tbody.innerHTML = throwns
                Swal.fire(``, 'Deleted Successfully', 'success')
            }
            /* else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }*/
        })

        
    }
</script>