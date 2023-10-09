       <!--Manage User-->
       <div class="mainbodycontainer">
                <div class="classHeader">
                    <h1>Staffs</h1>
                    <button class="addbtn" onclick="AddStaff()">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    </button>
                </div>
                <div class="stafflistbox">
                    <div class="box">
                        <h2>List of Staffs</h2>
                        <div class="box2">
                        <table class="table" style="border-collapse: collapse;">
                            
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
<?php
    $sqlcode = "SELECT a.ID, a.Email, CONCAT(b.StaffLname,', ', b.StaffFname, ' ', b.StaffMname ) AS staffname FROM users a
                RIGHT JOIN staffinfos b on a.ID = b.userID ORDER BY CONCAT(b.StaffLname,', ', b.StaffFname, ' ', b.StaffMname );";

    $queryrun = mysqli_query($conn,$sqlcode);
    $tableresult = "";

    while($result = mysqli_fetch_assoc($queryrun)){
        $tableresult .="
                <tr>
                    <td>".$result["staffname"]."</td>
                    <td>".$result["Email"]."</td>
                    <td class='ActionTABLE' id='".$result["ID"]."'>
                        <button class='Editbtn'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z'/></svg>
                        </button>
                        <button class='Deletebtn' onclick='DELETIONBTN(this)'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg>
                        </button>
                    </td>
                </tr>";
    }

    echo $tableresult;


?>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            </div>

<script>

    const tbody = document.getElementById('tbody')


    async function AddStaff(){
        const { value: formValues } = await Swal.fire({
        title: 'Adding Staffs',
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="First name">' +
            '<input id="swal-input2" class="swal2-input" placeholder="Middle name">' +
            '<input id="swal-input3" class="swal2-input" placeholder="Last name">'+
            '<input id="swal-input4" class="swal2-input" placeholder="Email">'+
            '<input id="swal-input5" class="swal2-input" placeholder="Default Password" value="1234567890">',
        focusConfirm: false,
        confirmButtonText: 'Save',
        showCancelButton: true,
        preConfirm: () => {
            return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value,
                document.getElementById('swal-input3').value,
                document.getElementById('swal-input4').value,
                document.getElementById('swal-input5').value
            ]
        }
        })

        const hasBlankData = formValues.some(item => item === "");

        if (!hasBlankData) {
            //Swal.fire(JSON.stringify(formValues))
            let sqlcode = `SELECT * FROM users WHERE Email = '${formValues[3]}' AND (Access = 'ADMIN' OR Access = 'STAFF');`

  
            let throwns = await AjaxSendv3(sqlcode,"ListStaffLogic","&State=Validation")

            if(throwns.includes("error")){
                eval(throwns)
            }else{
                sqlcode1 = `INSERT INTO users (Email, Password, Access) VALUES ('${formValues[3]}', '${formValues[4]}', 'STAFF')`;
                throwns = await AjaxSendv3(sqlcode1,"ListStaffLogic",`&State=Insertion&fname=${formValues[0]} &mname=${formValues[1]}&lname=${formValues[2]}&email=${formValues[3]}`)

                tbody.innerHTML = throwns
            }


        }else{
            SweetError();
        }
    }

    async function DELETIONBTN(e) {
        let targetid = e.parentNode.id
        let targetname = e.parentNode.parentNode.cells[0].innerHTML

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
                let throwns = await AjaxSendv3(sqlcode,"ListStaffLogic","&State=Deletion")
                tbody.innerHTML = throwns
                Swal.fire(``, 'Deleted Successfully', 'success')
            }
            /* else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }*/
        })

        
    }
    


</script>