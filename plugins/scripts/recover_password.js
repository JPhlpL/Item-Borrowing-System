$(document).ready(function() {
 
    $("#recoverBtn").click(function(e) {

        e.preventDefault();

       var user_id = $("#user_id").val();
       var password = $("#password").val();
       
       if(password == '') {
       alert("Please fill all fields.");
           return false;
       }
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
            $.ajax({
                type: "POST",
                url: "../controller/controller_recoverPassword.php",
                data: {
                    user_id: user_id,
                    password: password
                },
                success: function()
                { 
                    Swal.fire(
                        'Success',
                        'Your password is now reset. Thank you!',
                        'success'
                      ).then(function()
                      {  
                        window.location.href='../../public/view/logout.php';
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