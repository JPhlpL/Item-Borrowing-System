//! Approve
$('body').on('click', '#approvalBtn', function () {

    var IT_TRANSACTION_CODE_HASHED = $("#IT_TRANSACTION_CODE_HASHED").val();

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
                url:"../controller/controller_approveRequestForm.php",
                type: "POST",
                data: {
                    IT_TRANSACTION_CODE_HASHED: IT_TRANSACTION_CODE_HASHED
                },
                success: function()
                { 
                    Swal.fire(
                        'Success',
                        'The data is now approved. Thank you!',
                        'success'
                    ).then(function()
                    {  
                       location.href = 'tblapprove.php';
                    });
                },
                
                error: function() {
                    Swal.fire(
                        'Success',
                        'The data is now approved. Thank you!',
                        'success'
                    ).then(function()
                    {  
                        location.href = 'tblapprove.php';
                    });
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
return false;  
});

//! Decline
$('body').on('click', '#declineBtn', function () {

    var IT_TRANSACTION_CODE_HASHED = $("#IT_TRANSACTION_CODE_HASHED").val();

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
                url:"../controller/controller_declineRequestForm.php",
                type: "POST",
                data: {
                    IT_TRANSACTION_CODE_HASHED: IT_TRANSACTION_CODE_HASHED
                },
                success: function()
                { 
                    Swal.fire(
                        'Success',
                        'The data is now approved. Thank you!',
                        'success'
                    ).then(function()
                    {  
                       location.href = 'tblapprove.php';
                    });
                },
                
                error: function() {
                    Swal.fire(
                        'Success',
                        'The data is now approved. Thank you!',
                        'success'
                    ).then(function()
                    {  
                        location.href = 'tblapprove.php';
                    });
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
return false;  
});