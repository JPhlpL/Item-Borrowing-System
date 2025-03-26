<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header bg-dark">
                <h3 class="card-title"> To-Do List </h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">

                <div class="form-group">  
                    <button class="btn btn-success successbtn" id="addNew"> + </button>
                        <form name="add_order" id="add_order">  
                            <div class = "row">
                                <div class="col">
                                    <label class="form-label">Form No.</label>
                                    <input type="text" class="form-control" name="RECORD_NUM" id="RECORD_NUM">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="RECORD_NAME" id="RECORD_NAME">
                                </div>
                            </div>
                          
                            <div class="table-responsive">  
                                <table class="table table-hover" id="autocomplete_table">  
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>To-Do Name</th>
                                            <th>To-Do Number</th>
                                            <th>Quantity</th>
                                            <th>Remarks</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="row_1"> 
                                            <td><input type="text" placeholder="Enter To-Do Name" data-type="TODO_NAME" name="TODO_NAME[]" id="TODO_NAME_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="text" placeholder="Enter To-Do Number" data-type="TODO_NUMBER" name="TODO_NUMBER[]" id="TODO_NUMBER_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="number" data-type="TODO_QUANTITY" name="TODO_QUANTITY[]" id="TODO_QUANTITY_1" class="form-control "/></td>  
                                            <td><input type="text" data-type="TODO_REMARKS" name="TODO_REMARKS[]" id="TODO_REMARKS_1" placeholder="Enter Remarks" class="form-control"/></td>  
                                            <td><button id="delete_1" class="delete_row btn btn-danger" style="cursor:pointer;"> - </button></td>
                                        </tr>  
                                     </tbody>
                                </table>  
                              
                            </div> 
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Date and Time</label>
                                    <input type="datetime-local" class="form-control" name="RECORD_DATETIME">
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="RECORD_REMARKS"></textarea>
                                </div>
                            </div>
                            <input type="submit" name="toDoBtn" id="toDoBtn" class="btn btn-info" value="Submit" />  
                        </form>  
                      
                    </div> 

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

