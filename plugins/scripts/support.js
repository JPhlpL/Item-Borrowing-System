$(document).ready(function() {
 
    $("#emailBtn").click(function(e) {
   
       e.preventDefault();

       var name = $("#name").val();
       var email = $("#email").val();
       var subject = $("#subject").val();
       var messageContent = $("#messageContent").val();


       if(subject == '') {
       alert("Please fill all fields.");
           return false;
       }
   
        Swal.fire({
            title: "Are you sure?",
            text: "Submit the message?",
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
                    url: "../controller/controller_sendsupportEmail.php",
                    data: {
                        name: name,
                        email: email,
                        subject: subject,
                        messageContent: messageContent
                    },
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'Your message is now sent. Thank you!',
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