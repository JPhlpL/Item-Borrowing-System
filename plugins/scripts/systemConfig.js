$(document).ready(function() {
 
    $("#configSystemBtn").click(function(e) {
   
       e.preventDefault();

        var id = $("#id").val();
        var system_name = $("#system_name").val();
        var system_title_header = $("#system_title_header").val();
        var system_author = $("#system_author").val();
        var system_dept = $("#system_dept").val();
        var system_status = $("#system_status").val();
        var system_description = $("#system_description").val();
        var system_logo = $("#system_logo").val();
        var system_datetime_published = $("#system_datetime_published").val();

       if(system_name == '') {
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
                    url: "../controller/controller_systemConfig.php",
                    data: {
                        id : id,
                        system_name : system_name,
                        system_title_header : system_title_header,
                        system_author : system_author,
                        system_dept : system_dept,
                        system_status : system_status,
                        system_description : system_description,
                        system_logo : system_logo,
                        system_datetime_published : system_datetime_published
                    },
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'The system configuration is now updated. Thank you!',
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