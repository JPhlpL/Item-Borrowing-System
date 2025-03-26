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
                        <form name="add_order" id="add_order" method="post" enctype="multipart/form-data">  
                            <div class = "row">
                                <div class="col">
                                    <label class="form-label">Control No.</label>
                                    <input type="text" class="form-control" name="IT_FORM_NUM" id="IT_FORM_NUM" value="F-2022-F01">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="IT_ENCODER" id="IT_ENCODER" value="<?php echo $_SESSION['USER_NAME']; ?>" readonly>
                                </div>
                            </div>
                          
                            <div class="table-responsive">  
                                <table class="table table-hover" id="autocomplete_table">  
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Control Number</th>
                                            <th>Quantity</th>
                                            <th>Remarks</th>
                                            <th>Item Picture</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="row_1"> 
                                            <td><input type="text" data-type="IT_ITEM_NAME" name="IT_ITEM_NAME[]" id="IT_ITEM_NAME_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="text" data-type="IT_ITEM_CONTROL_NUMBER" name="IT_ITEM_CONTROL_NUMBER[]" id="IT_ITEM_CONTROL_NUMBER_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                                            <td><input type="number" data-type="IT_ITEM_QUANTITY" name="IT_ITEM_QUANTITY[]" id="IT_ITEM_QUANTITY_1" class="form-control "/></td>  
                                            <td><input type="text" data-type="IT_ITEM_REMARKS" name="IT_ITEM_REMARKS[]" id="IT_ITEM_REMARKS_1" class="form-control"/></td>  
                                            <td><input type="file" data-type="IT_ITEM_PHOTO" id="IT_ITEM_PHOTO_1" name="IT_ITEM_PHOTO[]"/></td>
                                            <!-- Lagyan ng item photo -->
                                            <td><button id="delete_1" class="delete_row btn btn-danger" style="cursor:pointer;"> - </button></td>
                                        </tr>  
                                     </tbody>
                                </table>  
                              
                            </div> 
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Date and Time</label>
                                    <input type="datetime-local" class="form-control" name="IT_FORM_DATETIME_CREATED">
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="IT_FORM_REMARKS"></textarea>
                                </div>
                            </div>
                            <input type="submit" name="toDoBtn" id="toDoBtn" class="btn btn-info" value="Submit" />  
                        </form>  
                      
                    </div> 

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

