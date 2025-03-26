$(document).ready(function(){

    //! Edit
    $('body').on('click', '#btn-edit', function () {
        var id = $(this).data('id'); // Primary ID 
        $.ajax({
            url:"../controller/controller_crud_returnRequestForm.php",
            type: "POST",
            data: {
                id: id,
                mode: 'edit' 
            },
            dataType : 'json',
            success: function(result){
            $('#id').val(result.id);
            $('#IT_REQUEST_CONTROL_NUMBER').val(result.IT_REQUEST_CONTROL_NUMBER);
            $('#IT_REQUEST_ITEM_NAME').val(result.IT_REQUEST_ITEM_NAME);
            $('#IT_REQUEST_TRANSACTION_ID').val(result.IT_REQUEST_TRANSACTION_ID);
            $('#IT_REQUEST_ITEM_QUANTITY')
                .attr("max",result.IT_REQUEST_ITEM_QUANTITY)
                .attr("min",0)
                .val(result.IT_REQUEST_ITEM_QUANTITY);
            $('#edit-modal').modal('show');
            }
        });
    });

    $('#update-form').submit(function(e){
        e.preventDefault();
        // ajax
        $.ajax({
            url:"../controller/controller_crud_returnRequestForm.php",
            type: "POST",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
                Swal.fire(
                    'Success',
                    'The data is now updated. Thank you!',
                    'success'
                ).then(function()
                {  
                   location.reload();
                });
            }
        });
    });  

 //! Select All w/ Selected
 $(".selectAll").on('click',function() { // bulk checked
    var status = this.checked;
    $(".selectedRow").each( function() {
        $(this).prop("checked",status);
    });
});
 
//! Selected Row
$('.deleteTriger').on("click", function(event){ // triggering delete one by one
    if( $('.selectedRow:checked').length > 0 ){  // at-least one checkbox checked
        var ids = [];
        $('.selectedRow').each(function(){
            if($(this).is(':checked')) { 
                ids.push($(this).val());
            }
        });
        var ids_string = ids.toString();  // array to string conversion 
        $.ajax({
            type: "POST",
            url: "../controller/controller_bulkDelete_tblUser.php",
            data: {data_ids:ids_string},
            success: function(result) {
                dataTable.draw(); // redrawing datatable
            },
            async:false
        });
    }
}); 
    
//! Returned
$('body').on('click', '#returnBtn', function () {

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
                url:"../controller/controller_returnRequestForm.php",
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
});