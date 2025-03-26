$(document).ready(function() {
 
    $("#submitBtn").click(function(e) {

        e.preventDefault();
   
        var Name = $("#Name").val();
        var Employee_num = $("#Employee_num").val();
        var gender = $("#gender").val();
        var Email = $("#Email").val();
        var cpnum = $("#cpnum").val();
        var Dept = $("#Dept").val();
        var Section = $("#Section").val();
        var Position = $("#Position").val();
 
        if(Name == '') {
            Swal.fire(
                'Error',
                'Check again your inputs. Thank you!',
                'error'
              )
            return false;
        }

       Swal.fire({
        title: "Confirmation",
        text: "Are you sure you want to submit?",
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
                url: "../controller/controller_updateprofile.php",
                data: {
                    Name: Name,
                    Employee_num: Employee_num,
                    gender: gender,
                    Email: Email,
                    cpnum: cpnum,
                    Dept: Dept,
                    Section: Section,
                    Position: Position
                },
                success: function()
                { 
                    Swal.fire(
                        'Success',
                        'Your bio is now updated. Thank you!',
                        'success'
                      ).then(function()
                      {  
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true
                          });
                          
                          Toast.fire({
                            icon: 'success',
                            title: 'Refreshing...'
                          }).then(function(){
                            location.reload();
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