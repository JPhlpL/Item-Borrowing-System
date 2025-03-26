<div class="modal fade" id="edit-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">

              <h4 class="modal-title" id="userCrudModal"> Edit Form </h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

          </div>
          <div class="modal-body">
              <form id="update-form" name="update-form" class="form-horizontal">
                 <input type="hidden" name="id" id="id">
                  <input type="hidden" class="form-control" id="mode" name="mode" value="update">

                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="control-label">User ID</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_ID" name="USER_ID" value="" maxlength="50" required="">
                            </div>
                        </div>
                  </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_PASS" name="USER_PASS" value="" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                  </div>


                <div class="row">
                    <div class="col-2">  
                        <div class="form-group">
                            <label for="name" class=" control-label">Employee ID</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="USER_EMPLOYEE_ID" name="USER_EMPLOYEE_ID" value="" maxlength="50" required="">
                            </div>
                        </div>      
                    </div>
                    <div class="col">  
                        <div class="form-group">
                            <label for="name" class=" control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_NAME" name="USER_NAME" value="" maxlength="50" required="">
                            </div>
                        </div>      
                    </div>
                    <div class="col-2">    
                        <div class="form-group">
                            <label for="name" class=" control-label">Gender</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_GENDER" name="USER_GENDER" value="" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class=" control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_EMAIL" name="USER_EMAIL" value="" maxlength="50" required="">
                            </div>
                        </div>  
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="name" class=" control-label">Account type</label>
                            <a disabled class="control-label text-dark" data-toggle="tooltip" data-placement="top" data-html="true" title="0 = Super Admin, 1 = Admin, 2 = User">
                                <i class="fas fa-question-circle"></i>
                            </a>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="USER_ACCOUNT_TYPE" name="USER_ACCOUNT_TYPE" value="" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                </div>     

                <div class="row">
                    <div class="col"> 
                        <div class="form-group">
                        <label for="name" class=" control-label">Department</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="USER_DEPT" name="USER_DEPT" value="" maxlength="50" required="">
                        </div>
                        </div>       
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label for="name" class=" control-label">Section</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="USER_SECTION" name="USER_SECTION" value="" maxlength="50" required="">
                        </div>
                        </div>
                    </div>
                </div>
                  
                 
                <div class="row">
                    <div class="col"> 
                        <div class="form-group">
                        <label for="name" class="control-label">Position</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="USER_POSITION" name="USER_POSITION" value="" maxlength="50" required="">
                            </div>
                        </div>       
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="name" class="control-label">Mobile No.</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="USER_MOBILE" name="USER_MOBILE" value="" maxlength="50" required="">
                        </div>
                        </div>
                    </div>
                </div>                
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
          </div>
          </form>
      </div>
  </div>
</div>