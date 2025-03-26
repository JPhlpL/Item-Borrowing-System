$(document).ready(function() {
 
    $("#changebtn").click(function(e) {

        e.preventDefault();
   
       var empnum = $("#empnum").val();
       var username = $("#username").val();
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
            //
            $.ajax({
                type: "POST",
                url: "../controller/controller_changeuserpass.php",
                data: {
                    empnum: empnum,
                    username: username,
                    password: password
                },
                success: function()
                { 
                    Swal.fire(
                        'Success',
                        'Your password is now changed. Thank you!',
                        'success'
                      ).then(function()
                      {  
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                          });
                          
                          Toast.fire({
                            icon: 'success',
                            title: 'Logging out...'
                          }).then(function(){
                            window.location.href='../../public/view/logout.php';
                            return false;
                          });
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