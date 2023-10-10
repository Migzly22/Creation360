<?php
    $sqlcode = "SELECT a.*, b.Email FROM staffinfos a LEFT JOIN users b ON a.userID = b.ID WHERE a.StaffID = '".$_SESSION["STAFFID"]."';";
    $queryrun = mysqli_query($conn,$sqlcode);
    $result = mysqli_fetch_assoc($queryrun);

?>

<!--Settings-->
            <div class="mainbodycontainer">
                <div class="classHeader">
                    <h1>Settings</h1>
                </div>
                <div class="stafflistbox SETTINGS" id="tbody">
                    <div class="box">
                        <h1>Basic Information</h1>
                        <p>Manage and update your Personal Information</p>
                        <div class="box2">
                            <table class="table" style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <th scope='row'>User Number</th>
                                        <td colspan="2">

                                            <span id='studnum'><?php echo $_SESSION["STAFFID"]; ?></span>

                                        </td>
            
                                    </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td id="namecontainer">
                                        <span id='name'><?php echo $result["StaffFname"]; ?></span>
                                        <span id='mname'><?php echo $result["StaffMname"]; ?></span>
                                        <span id='lname'><?php echo $result["StaffLname"]; ?></span>



                                    </td>
                                    <td class="ActionTABLE">
                                        <button class="Editbtn" onclick="Editdata(this,<?php echo $_SESSION['USERID'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                        </button>
                
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" >Phone Number</th>
                                    <td id="Phonenumber">
                                        <span><?php echo $result["StaffPhonenumber"]; ?></span>
                                    </td>
                                    <td class="ActionTABLE">
                                        <button class="Editbtn" onclick="Editdata(this,<?php echo $_SESSION['USERID'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                        </button>
                
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" >Address</th>
                                    <td id="Address">
                                        <span ><?php echo $result["StaffAddress"]; ?></span>
                                    </td>
                                    
                                    <td class="ActionTABLE">
                                        <button class="Editbtn" onclick="Editdata(this,<?php echo $_SESSION['USERID'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                        </button>
                
                                    </td>
                                </tr>
                                


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box">
                        <h1>Login Information</h1>
                        <p>Manage and update your Login Information</p>
                        <div class="box2">
                            <table class="table" style="border-collapse: collapse;">
                                <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td id="Email">
                                        <span><?php echo $result["Email"]; ?></span>
                                    </td>
                                    <td class="ActionTABLE">
                                        <button class="Editbtn" onclick="Editdata(this,<?php echo $_SESSION['USERID'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                        </button>
                
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Password</th>
                                    <td id="Password">
                                        <span id="pass">*************</span>
                                    </td>
                                    <td class="ActionTABLE">
                                        <button class="Editbtn" onclick="Editdata(this,<?php echo $_SESSION['USERID'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                        </button>
                
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<script>
    const tbody = document.getElementById("tbody");
    async function Editdata(e,userid){

        let Title = e.parentNode.parentNode.cells[0].innerHTML
        let Spansdata = e.parentNode.parentNode.cells[1]

        let newdatacollector = Spansdata.querySelectorAll('span')
        let spanlenght = newdatacollector.length;

        let htmldata = ``;
        let counter = 0
        let datatochange = Spansdata.id

        switch (Title) {
            case 'Name':
                htmldata += `<input id="swal-input1" class="swal2-input" placeholder="First name" value="${newdatacollector[0].innerText.replace(/\s+/g, ' ').trim()}">`;
                htmldata += `<input id="swal-input2" class="swal2-input" placeholder="Middle name" value="${newdatacollector[1].innerText.replace(/\s+/g, ' ').trim()}">`;
                htmldata += `<input id="swal-input3" class="swal2-input" placeholder="Last name" value="${newdatacollector[2].innerText.replace(/\s+/g, ' ').trim()}">`;
                counter =3
                break;
            case 'Password':
                htmldata += `<input id="swal-input1" class="swal2-input" placeholder="New Password"><input id="swal-input2" class="swal2-input" placeholder="Confirm Password">`;
                counter =2
                break;
            case 'Address':
                htmldata += `<textarea name="" id="swal-input1" class="swal2-textarea swal2-input"  cols="20" rows="10" placeholder="${Title}" >${newdatacollector[0].innerText.replace(/\s+/g, ' ').trim()}</textarea>`
                counter =1
                break;                    
            default:
                htmldata += `<input id="swal-input1" class="swal2-input" placeholder="${Title}" value="${newdatacollector[0].innerText.replace(/\s+/g, ' ').trim()}">`;
                counter =1
                break;
        }



        const { value: formValues } = await Swal.fire({
            title: 'Changing '+Title,
            html: htmldata,
            focusConfirm: false,
            confirmButtonText: 'Save',
            showCancelButton: true,
            preConfirm: () => {
                return Array.from({ length: counter }, (_, i) => document.getElementById('swal-input'+(i+1)).value);
            }
        })

        const hasBlankData = formValues.some(item => item === "");

        if (!hasBlankData) {
            //Swal.fire(JSON.stringify(formValues))

            if(Title === "Password"){
                if(formValues[0] !== formValues[1]){
                    await SweetError()
                    return true;
                }
            }


            let sqlcode = ""
            if(Title === "Name"){                
                sqlcode = `UPDATE staffinfos SET StaffFname = '${formValues[0]}', StaffMname = '${formValues[1]}',StaffLname = '${formValues[2]}' WHERE userID ='${userid}';`
            }else if(Title === "Email" || Title === "Password" ){
                sqlcode = `UPDATE users SET ${datatochange} = '${formValues[0]}' WHERE ID ='${userid}';`
            }else{
                sqlcode = `UPDATE staffinfos SET ${"Staff"+datatochange} = '${formValues[0]}' WHERE userID ='${userid}';`
            }
            console.log(sqlcode)
            let throwns = await AjaxSendv3(sqlcode,"SETTINGSLogic","")

            tbody.innerHTML = throwns

        }else{
            SweetError();
        }
    }

</script>