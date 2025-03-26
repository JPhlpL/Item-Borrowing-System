

$(document).ready(function(){
    $('body').on('click', '#deleteComment', function () {
        var id = $(this).data('id');
        
    
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
                    url:"../controller/controller_deleteComment.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType : 'json',
                    
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'The data is now deleted. Thank you!',
                            'success'
                        ).then(function()
                        {  
                            location.reload();
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