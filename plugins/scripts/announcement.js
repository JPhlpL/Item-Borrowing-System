$(document).ready(function() {
    
    //! Create
    $("#announcementBtn").click(function(e) {
   
       e.preventDefault();

       var name = $("#name").val();
       var announcementContent = $("#announcementContent").val();


       if(announcementContent == '') {
       Swal.fire( 
       'Error',
       'No Input Found!',
       'error');
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
                    url: "../controller/controller_sendAnnouncement.php",
                    data: {
                        name: name,
                        announcementContent: announcementContent
                    },
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'Your announcement is now sent. Thank you!',
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

