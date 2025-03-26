$(document).ready(function() {
 
    $("#configEmailBtn").click(function(e) {
   
       e.preventDefault();

        var id = $("#id").val();
        var host_address = $("#host_address").val();
        var host_charset = $("#host_charset").val();
        var host_smtp_secure = $("#host_smtp_secure").val();
        var host_port = $("#host_port").val();
        var host_smtpkeepalive = $("#host_smtpkeepalive").val();
        var host_ishtml = $("#host_ishtml").val();
        var host_setfrom = $("#host_setfrom").val();


       if(host_address == '') {
        Swal.fire(
            'Error',
            'Check again your inputs. Thank you!',
            'error'
          )
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
                    url: "../controller/controller_emailConfig.php",
                    data: {
                        id : id,
                        host_address : host_address,
                        host_charset : host_charset,
                        host_smtp_secure : host_smtp_secure,
                        host_port : host_port,
                        host_smtpkeepalive : host_smtpkeepalive,
                        host_ishtml : host_ishtml,
                        host_setfrom : host_setfrom
                    },
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'The email configuration is now updated. Thank you!',
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