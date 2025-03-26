<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header bg-dark">
                <h3 class="card-title"> Request Form </h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">

                <div class="form-group">  
                    <button class="btn btn-success successbtn" id="addNew"> + </button>
                        <form name="add_order" id="add_order" method="post" enctype="multipart/form-data">  
                            <div class = "row">
                                <div class="col">
                                    <label class="form-label">Control No.</label>

                                    <input type="text" class="form-control" name="IT_TRANSACTION_ID" id="IT_TRANSACTION_ID" value="<?php echo $currentTransactID; ?>" readonly>
                                    
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="IT_BORROWER_NAME" id="IT_BORROWER_NAME" value="<?php echo $_SESSION['USER_NAME']; ?>" readonly>
                                </div>
                            </div>
                          
                            <div class="table-responsive mt-3">  
                                <table class="table table-hover table-bordered" id="autocomplete_table">  
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>
                                                <a disabled class="control-label text-info" data-target="#availableItems" data-toggle="modal" data-placement="top" data-html="true" title="See All Items">
                                                    <i class="fas fa-question-circle"></i>
                                                </a> Item Name </th>
                                            <th>Control Number</th>
                                            <th>Quantity</th>
                                            <th>Remarks</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="row_1"> 
                                            <td><input type="text" data-type="IT_REQUEST_ITEM_NAME" name="IT_REQUEST_ITEM_NAME[]" id="IT_REQUEST_ITEM_NAME_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="text" data-type="IT_REQUEST_CONTROL_NUMBER" name="IT_REQUEST_CONTROL_NUMBER[]" id="IT_REQUEST_CONTROL_NUMBER_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="number" data-type="IT_REQUEST_ITEM_QUANTITY" name="IT_REQUEST_ITEM_QUANTITY[]" id="IT_REQUEST_ITEM_QUANTITY_1" class="form-control "/></td>  
                                            <td><input type="text" data-type="IT_REQUEST_ITEM_REMARKS" name="IT_REQUEST_ITEM_REMARKS[]" id="IT_REQUEST_ITEM_REMARKS_1" class="form-control"/></td>  
                                            <td><button id="delete_1" class="delete_row btn btn-danger" style="cursor:pointer;"> - </button></td>
                                        </tr>  
                                     </tbody>
                                </table>  
                              
                            </div> 

                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Date From </label>
                                    <input type="date" class="form-control" name="IT_DATE_FROM" id="IT_DATE_FROM">
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Date To</label>
                                    <input type="date" class="form-control" name="IT_DATE_TO" id="IT_DATE_TO">
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Remarks </label>
                                    <textarea class="form-control" name="IT_REMARKS" id="IT_REMARKS"></textarea>
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Purposes</label>
                                    <textarea class="form-control" name="IT_PURPOSE" id="IT_PURPOSE"></textarea>
                                </div>
                            </div>
                            

                            <input type="submit" name="toDoBtn" id="toDoBtn" class="btn btn-info" value="Submit" />  
                        </form>  
                      
                    </div> 

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

