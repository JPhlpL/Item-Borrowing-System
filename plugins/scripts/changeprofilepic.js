$(document).ready(function() {
 
    $("#uploadBtn").click(function() {
   
    var submitButton = document.getElementById('submitButton');

        Swal.fire({
            title: "Confirm",
            text: "Are you sure you want to upload?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                submitButton.click();
            } 
            else if (result.value === "")
            {
                Swal.fire("Cancelled", "Cancel", "error");
                return false;  
            }
            });
   });
   return false;  
});