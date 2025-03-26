$(document).ready(function() {
    
    //! Create
    $("#cartBtn").click(function(e) {

        e.preventDefault();

        var IT_TRANSACTION_ID = $("#IT_TRANSACTION_ID").val();
        var IT_BORROWER_NAME = $("#IT_BORROWER_NAME").val();
        var IT_DATE_FROM = $("#IT_DATE_FROM").val();
        var IT_DATE_TO = $("#IT_DATE_TO").val();
        var IT_REMARKS = $("#IT_REMARKS").val();
        var IT_PURPOSE = $("#IT_PURPOSE").val();
   
        Swal.fire({
            title: "Confirmation",
            text: "Are you sure?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                //
                $.ajax({
                    type: "POST",
                    url: "../controller/controller_addtocart.php",
                    data: {
                        IT_TRANSACTION_ID: IT_TRANSACTION_ID,
                        IT_BORROWER_NAME: IT_BORROWER_NAME,
                        IT_DATE_FROM: IT_DATE_FROM,
                        IT_DATE_TO: IT_DATE_TO,
                        IT_REMARKS: IT_REMARKS,
                        IT_PURPOSE: IT_PURPOSE
                    },
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'Your request is now sent. Thank you!',
                            'success'
                          ).then(function()
                          {  location.reload();
                              return false;
                          });
                    },
                    
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Check again your inputs. Thank you!',
                            'error'
                          )
                    }
                 });
                 //
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

