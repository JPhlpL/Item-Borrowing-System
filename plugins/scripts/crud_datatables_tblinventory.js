


$(document).ready(function(){
        
    //! Creaete
    $('#add-model').click(function () {
        $('#add-modal').modal('show');
    });
    
    // add form submit
    $('#add-form').submit(function(e){
        e.preventDefault();
        // ajax
        $.ajax({
            url:"../controller/controller_crud_tblinventory.php",
            type: "POST",
            data: new FormData(this), // get all form field value in serialize form
            contentType: false,
            cache: false,
            processData:false,
            success: function(){
                Swal.fire(
                    'Success',
                    'The data is now inserted. Thank you!',
                    'success'
                ).then(function()
                {  
                var oTable = $('#mainTable').dataTable(); 
                oTable.fnDraw(false);
                $('#add-modal').modal('hide');
                $('#add-form').trigger("reset");
                });
            }
        });
    });  

    //! Edit
    $('body').on('click', '#btn-edit', function () {
        var id = $(this).data('id'); // Primary ID 
        $.ajax({
            url:"../controller/controller_crud_tblinventory.php",
            type: "POST",
            data: {
                id: id,
                mode: 'edit' 
            },
            dataType : 'json',
            success: function(result){
            $('#id').val(result.id);
            $('#IT_ITEM_NAME').val(result.IT_ITEM_NAME);
            $('#IT_ITEM_CONTROL_NUMBER').val(result.IT_ITEM_CONTROL_NUMBER);
            $('#IT_ITEM_QUANTITY').val(result.IT_ITEM_QUANTITY);
            $('#IT_ITEM_DESCRIPTION').val(result.IT_ITEM_DESCRIPTION);
            $('#IT_ITEM_REMARKS').val(result.IT_ITEM_REMARKS);
            $('#IT_ITEM_STATUS').val(result.IT_ITEM_STATUS);
            $('#IT_ITEM_FIRSTCLAIM_DATETIME').val(result.IT_ITEM_FIRSTCLAIM_DATETIME);
            $('#IT_ITEM_ENCODER').val(result.IT_ITEM_ENCODER);
            $('#IT_ITEM_PIC').val(result.IT_ITEM_PIC);
            $('#IT_FORM_NUM').val(result.IT_FORM_NUM);
            $('#edit-modal').modal('show');
            }
        });
    });
    $('#update-form').submit(function(e){
        e.preventDefault();
        // ajax
        $.ajax({
            url:"../controller/controller_crud_tblinventory.php",
            type: "POST",
            data: new FormData(this), // get all form field value in serialize form
            contentType: false,
            cache: false,
            processData:false,
            success: function()
            { 
                Swal.fire(
                    'Success',
                    'The data is now updated. Thank you!',
                    'success'
                ).then(function()
                {  
                    var oTable = $('#mainTable').dataTable(); 
                    oTable.fnDraw(false);
                    $('#edit-modal').modal('hide');
                    $('#update-form').trigger("reset");
                });
            },
         
        });
    });  
    
    //! Delete
    $('body').on('click', '#btn-delete', function () {
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
                    url:"../controller/controller_crud_tblinventory.php",
                    type: "POST",
                    data: {
                        id: id,
                        mode: 'delete' 
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
                            var oTable = $('#mainTable').dataTable(); 
                            oTable.fnDraw(false);
                        });
                    },
                    
                    error: function() {
                        Swal.fire(
                            'Success',
                            'The data is now deleted. Thank you!',
                            'success'
                        ).then(function()
                        {  
                            var oTable = $('#mainTable').dataTable(); 
                            oTable.fnDraw(false);
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

//! Datatables
    // Setup - add a text input to each footer cell
    $('#mainTable tfoot th').not(":eq(0),:eq(1)") //Exclude columns 3, 4, and 5
    .each( function () {
    var title = $('#mainTable thead th').eq( $(this).index() ).text();
    $(this).html( '<input type="text" />' );
    $('input').css('border-radius','5px');
    // $('input').first().css('width','4em');
    } );

    // Main
    var dataTable =  $('#mainTable').DataTable({
        "ajax": "../controller/controller_fetch_tblinventory.php",
        "type": "POST",
        "stateSave": true,
        "select": true,
        "rowId": 'id',
        "deferRender":    true,
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "serverSide": true,
        "select": {
            "style":    'multi',
            "selector": 'td:not(:nth-child(1)):not(:nth-child(2))'
        },

        buttons: [  
            {
                text: 'Manual',
                action: function ( e, dt, node, config ) {
                    $('#add-modal').modal('show');
                }
            },
            {
                text: 'Multiple ',
                action: function ( e, dt, node, config ) {
                    location.href = 'addMultipleItem.php'
                }
            },
            {
                text: 'Import ',
                action: function ( e, dt, node, config ) {
                    location.href = 'inventoryUpload.php'
                }
            },
            {
                text: 'Delete',
                className: 'deleteTriger'
             
            },
            'createState',
            'savedStates',
            'colvis',
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ],
        //! For Searching
        initComplete: function () 
        {
        var r = $('#mainTable tfoot tr');
            r.find('th').each(function(){
                $(this).css('padding', 8);
            });
            $('#mainTable thead').append(r);
            $('#search_0').css('text-align', 'center');
            
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } ).buttons().container().appendTo('#mainTable_wrapper .col-md-6:eq(0)');
        }
    } )

 //! Select All w/ Selected
 $(".selectAll").on('click',function() { // bulk checked
    var status = this.checked;
    $(".selectedRow").each( function() {
        $(this).prop("checked",status);
    });
});
 
//! Delete
$('.deleteTriger').on("click", function(event){ // triggering delete one by one
    if( $('.selectedRow:checked').length > 0 ){  // at-least one checkbox checked
        var ids = [];
        $('.selectedRow').each(function(){
            if($(this).is(':checked')) { 
                ids.push($(this).val());
            }
        });
        var ids_string = ids.toString();  // array to string conversion 

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
                    url: "../controller/controller_bulkDelete_tblinventory.php",
                    data: {data_ids:ids_string},
                    
                    success: function()
                    { 
                        Swal.fire(
                            'Success',
                            'The data is now deleted. Thank you!',
                            'success'
                        ).then(function()
                        {  
                            dataTable.draw();
                        });
                        async:false
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
        return false;  
        }
    }); 
});