function testing(a) {
    alert(a)
}


//sweetalert
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
})

function SweetError() {
    Swal.fire({
        icon: 'error',
        text: 'Please Fill the form correctly',
    })
}
async function SweetSuccess() {
    await Toast.fire({
        icon: "success",
        title: "Updated Successfully"
    })
}

function AjaxSendv3(sqlcode,link,table = "", htmlParam="html", inside="",targetbody ="TBODY") {
    return new Promise(function(resolve, reject) {
            $.ajax({
            url:`./AjaxLogic/${link}.php`,
            type:"POST",
            data:'sqlcode='+sqlcode+table,
            dataType:htmlParam,
            beforeSend:function(){
           
            },
            error: function() 
            {
                SweetError();
                reject("An error occurred.");
            },
            success:function(data){
                if (!(link.includes("Filter"))){
                    SweetSuccess();
                }
                if (targetbody === "gname"){
                    $('#'+targetbody).val(data);
                }else{
                    if(targetbody !== ""){
                        $('#'+targetbody).html(data);
                    }
                }
                console.log(data)
                resolve(data);
            }
        }); 
    });
}