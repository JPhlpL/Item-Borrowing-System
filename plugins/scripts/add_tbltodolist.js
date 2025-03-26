


//declaring function
var SmartMultiFiled = (function(){
     var rowcount, html, addBtn, tableBody;
     
     addBtn = $("#addNew"); //for add button
     rowcount = $("#autocomplete_table tbody tr").length+1; //row count
     tableBody = $("#autocomplete_table tbody"); // table body
 
     //format of table
     function formHtml() {
         html = '<tr id="row_'+rowcount+'">';
         html += '<td><input type="text" placeholder="Enter To-Do Name" data-type="TODO_NAME" name="TODO_NAME[]" id="TODO_NAME_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
         html += '<td><input type="text" placeholder="Enter To-Do Number" data-type="TODO_NUMBER" name="TODO_NUMBER[]" id="TODO_NUMBER_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
         html += '<td><input type="number" name="TODO_QUANTITY[]" id="TODO_QUANTITY'+rowcount+'" class="form-control "/></td>';  
         html += '<td><input type="text" name="TODO_REMARKS[]" id="TODO_REMARKS_'+rowcount+'" placeholder="Enter To-Do Remarks" class="form-control"/></td>';  
         html += '<td><button id="delete_'+rowcount+'" class="delete_row btn btn-danger" style="cursor:pointer;"> - </button></td>';
 
         html += '</tr>';
         rowcount++;
         return html;
     }
 
     // get the field no
     function getFieldNo(type){
         var fieldNo;
         switch (type) {
             case 'TODO_NAME':
                 fieldNo = 0;
                 break;
             case 'TODO_NUMBER':
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
                     url:'../controller/controller_autocomplete_tbltodolist.php',
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
                 
             
                 $('#TODO_NAME_'+rowNo).val(resArr[0]);
                 $('#TODO_NUMBER_'+rowNo).val(resArr[1]);
 
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

     $("#toDoBtn").click(function(e) {

        e.preventDefault();

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
                url:"../controller/controller_addToDoList.php",  
                method:"POST",  
                data:$('#add_order').serialize(),  
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

  