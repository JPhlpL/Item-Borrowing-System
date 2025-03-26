


//declaring function
var SmartMultiFiled = (function(){
    var rowcount, html, addBtn, tableBody;
    
    addBtn = $("#addNew"); //for add button
    rowcount = $("#autocomplete_table tbody tr").length+1; //row count
    tableBody = $("#autocomplete_table tbody"); // table body

    //format of table
    function formHtml() {
        html = '<tr id="row_'+rowcount+'">';
        html += '<td><input type="text" data-type="IT_ITEM_NAME" name="IT_ITEM_NAME[]" id="IT_ITEM_NAME_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
        html += '<td><input type="text" data-type="IT_ITEM_CONTROL_NUMBER" name="IT_ITEM_CONTROL_NUMBER[]" id="IT_ITEM_CONTROL_NUMBER_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
        html += '<td><input type="number" name="IT_ITEM_QUANTITY[]" id="IT_ITEM_QUANTITY'+rowcount+'" class="form-control "/></td>';  
        html += '<td><input type="text" name="IT_ITEM_REMARKS[]" id="IT_ITEM_REMARKS_'+rowcount+'" class="form-control"/></td>';  
        html += '<td><input type="file" data-type="IT_ITEM_PHOTO" id="IT_ITEM_PHOTO_'+rowcount+'" name="IT_ITEM_PHOTO[]"/></td>';  
        html += '<td><button id="delete_'+rowcount+'" class="delete_row btn btn-danger" style="cursor:pointer;"> - </button></td>';

        html += '</tr>';
        rowcount++;
        return html;
    }

    // get the field no
    function getFieldNo(type){
        var fieldNo;
        switch (type) {
            case 'IT_ITEM_NAME':
                fieldNo = 0;
                break;
            case 'IT_ITEM_CONTROL_NUMBER':
                fieldNo = 1;
                break;
            default:
                break;
        }
        return fieldNo;
    }

    // handling autofill 
    function handleAutocomplete() {
        var type, fieldNo, currentEle; 
        type = $(this).data('type');
        fieldNo = getFieldNo(type);
        currentEle = $(this);

        if(typeof fieldNo === 'undefined') {
            return false;
        }

        $(this).autocomplete({
            source: function( data, cb ) {	 
                $.ajax({
                    url:'../controller/controller_autocomplete_tblinventory.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        name:  data.term,
                        fieldNo: fieldNo
                    },
                    success: function(res){
                        var result;
                        result = [
                            {
                                label: 'There is matching record found for '+data.term,
                                value: ''
                            }
                        ];

                        if (res.length) {
                            result = $.map(res, function(obj){
                                var arr = obj.split("|");
                                return {
                                    label: arr[fieldNo],
                                    value: arr[fieldNo],
                                    data : obj
                                };
                            });
                        }
                        cb(result);
                    }
                });
            },
            autoFocus: true,	      	
            minLength: 1,
            select: function( event, ui ) {
                var resArr, rowNo;
                
                
                rowNo = getId(currentEle);
                resArr = ui.item.data.split("|");	
                
            
                $('#IT_ITEM_NAME_'+rowNo).val(resArr[0]);
                $('#IT_ITEM_CONTROL_NUMBER_'+rowNo).val(resArr[1]);

            }		      	
        });
    }

    //getting the id
    function getId(element){
        var id, idArr;
        id = element.attr('id');
        idArr = id.split("_");
        return idArr[idArr.length - 1];
    }

    // add new row
    function addNewRow() { 
        tableBody.append( formHtml() );
    }

    // deleting row
    function deleteRow() { 
        var currentEle, rowNo;
        currentEle = $(this);
        rowNo = getId(currentEle);
        $("#row_"+rowNo).remove();
    }

    // Event Register
    function registerEvents() {
        addBtn.on("click", addNewRow);
        $(document).on('click', '.delete_row', deleteRow);
        //register autocomplete events
        $(document).on('focus','.autocomplete_txt', handleAutocomplete);
    }
    function init() {
        registerEvents();
    }

    return {
        init: init
    };
})();

$(document).ready(function(){  

    SmartMultiFiled.init();

    $("#add_order").submit(function(e) {

       e.preventDefault();

      
       $.ajax({
            
        url:"../controller/controller_addMultipleItems.php",  
        method:"POST",  
        data: new FormData(this), // get all form field value in serialize form
        contentType: false,
        cache: false,
        processData:false,
        success: function()
        { 
            Swal.fire(
                'Success',
                'Your form is submitted. Thank you!',
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
                    title: 'Refreshing...'
                  }).then(function(){
                    location.href = 'tblinventory.php';
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

});  
});  
  

 