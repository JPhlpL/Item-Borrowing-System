$(document).ready(function() {
 
    $("#forgotBtn").click(function(e) {
   
       e.preventDefault();

       var email = $("#email").val();

       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        if(email == '') {
            Toast.fire({
                icon: 'error',
                title: 'Please Check your inputs'
                })
             }
        else 
            {

            $.ajax({
                type: "POST",
                url: "../controller/controller_forgotPassword.php",
                data: {
                    email: email
                },
                success: function()
                { 
                    $("#form")[0].reset();

                    Toast.fire({
                        icon: 'success',
                        title: 'Please check your email providing the link for the reset password. Thank you!'
                        }).then(function()
                        {
                          
                        })
                },
                
                error: function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please Check your inputs'
                        })
                }
                });
            }     
        });
    return false;  
});