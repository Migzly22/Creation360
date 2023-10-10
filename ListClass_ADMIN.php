<!--List of Class-->
            <div class="mainbodycontainer">
                <div class="classHeader">
                    <h1>Classes</h1>
                    <button class="addbtn" id="<?php echo $_SESSION["STAFFID"] ?>" onclick="addClasslec(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    </button>
                </div>
                <div class="classListbox" id="tbody">

<?php
    $sqlcode = ($_SESSION["ACCESS"] == "ADMIN") ?  
        "SELECT a.*, CONCAT(b.StaffLname,', ', b.StaffFname, ' ', b.StaffMname ) AS staffname FROM classes a LEFT JOIN staffinfos b ON a.staffID = b.StaffID ORDER BY a.ClassID DESC;"
        :
        "SELECT a.*, CONCAT(b.StaffLname,', ', b.StaffFname, ' ', b.StaffMname ) AS staffname FROM classes a LEFT JOIN staffinfos b ON a.staffID = b.StaffID WHERE b.StaffID = '".$_SESSION["STAFFID"]."' ORDER BY a.ClassID DESC;";


    
    
    
    $queryrun = mysqli_query($conn,$sqlcode);
    $divbox = "";

    
    while ($result = mysqli_fetch_assoc($queryrun)){
        $divbox .="
            <div class='box' id='".$result['ClassID']."' onclick='ShowClass(`".$result['ClassID']."`)'>
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
                <div class='ClassCODEID' onclick='event.stopPropagation()'>
                    <code>
                        ".$result['ClassID']."
                    </code>
                    <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 384 512'><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z'/></svg>
                </div>
                
            </div>
        ";

    }

    echo $divbox;

?>
                </div>
                

            </div>

<script>
    const tbody = document.getElementById("tbody");

    async function addClasslec(id){
        console.log(id.id)
        const { value: formValues } = await Swal.fire({
        title: 'Adding Class',
        html:
            '<label for="swal2-textarea" class="swal2-input-label">Title</label><input id="swal-input1" class="swal2-input" placeholder="Title">' +
            '<label for="swal2-textarea" class="swal2-input-label">Description</label>'+
            '<textarea name="" id="swal-input2" class="swal2-textarea swal2-input"  cols="20" rows="10" placeholder="Class Description"></textarea>',
        focusConfirm: false,
        confirmButtonText: 'Save',
        showCancelButton: true,
        preConfirm: () => {
            return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value
            ]
        }
        })

        const hasBlankData = formValues.some(item => item === "");

        if (!hasBlankData) {
            //Swal.fire(JSON.stringify(formValues))
            let sqlcode = `INSERT INTO classes (ClassID, staffID, classDescription, classTitle) VALUES (NULL, '${id.id}', '${formValues[1]}', '${formValues[0]}');`

  
            let throwns = await AjaxSendv3(sqlcode,"ListClassLogic","&State=Insertion")


            tbody.innerHTML = throwns
        }else{
            SweetError();
        }
    }

    function ShowClass(classid){
        location.href = `./Mainpage.php?link=ShowClass&num=2&CID=${classid}`;
    }
</script>


<script>


        const elements = document.querySelectorAll('.ClassCODEID');

        // Define the function to log innerHTML
        function logInnerHTML() {
            let codeelement = this.querySelector('code')
            const codeText = codeelement.innerText

            const textarea = document.createElement('textarea');
            textarea.value = codeText;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'absolute';
            textarea.style.left = '-9999px'; // Move the textarea off-screen

            document.body.appendChild(textarea);

            // Select and copy the text
            textarea.select();
            document.execCommand('copy');

            // Remove the temporary textarea
            document.body.removeChild(textarea);

            Swal.fire("","Copied Successfully","success");
        }

        // Loop through the selected elements and attach the function to each
        elements.forEach(function(element) {
            element.addEventListener('click', logInnerHTML);
        });


        function copyCodeToClipboard() {
            const codeElement = document.getElementById('codeToCopy');
            const codeText = codeElement.textContent;

            // Create a temporary textarea element
            const textarea = document.createElement('textarea');
            textarea.value = codeText;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'absolute';
            textarea.style.left = '-9999px'; // Move the textarea off-screen

            document.body.appendChild(textarea);

            // Select and copy the text
            textarea.select();
            document.execCommand('copy');

            // Remove the temporary textarea
            document.body.removeChild(textarea);
        }
    </script>