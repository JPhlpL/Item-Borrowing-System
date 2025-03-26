

$(document).ready(function(){
        
//! Datatables
    // Setup - add a text input to each footer cell
    $('#mainTable tfoot th').not(":eq(0),:eq(5)") //Exclude columns 3, 4, and 5
    .each( function () {
    var title = $('#mainTable thead th').eq( $(this).index() ).text();
    $(this).html( '<input type="text" />' );
    $('input').css('border-radius','5px');
    // $('input').first().css('width','4em');
    } );

    // Main
    var dataTable =  $('#mainTable').DataTable({
        "ajax": "../controller/controller_fetch_tbltodolist.php",
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
        "columnDefs": 
        [ 
            { 
                "bSortable": false, 
                "aTargets": [ 0,5 ]
            }
        ],
        buttons: [  
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


   
    
});