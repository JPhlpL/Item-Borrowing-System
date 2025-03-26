<div class="modal fade" id="edit-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">

              <h4 class="modal-title" id="userCrudModal"> Edit Item </h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                  <div class="modal-body">
                    <form id="update-form" name="update-form" class="form-horizontal" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id">

                        <input type="hidden" class="form-control" id="mode" name="mode" value="update">

                        <div class="form-group">
                            <label for="name" class="control-label">Item Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_NAME" name="IT_ITEM_NAME" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Control Number</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_CONTROL_NUMBER" name="IT_ITEM_CONTROL_NUMBER" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Photo</label>
                            <div class="custom-file">
                                <input type="file" id="IT_ITEM_PHOTO" name="IT_ITEM_PHOTO" class="custom-file-input" onchange="previewItemPhotoEdit()">
                                <label class="custom-file-label" for="upload_file">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="photoPreviewEdit" class="border rounded" width="150" height="150"/>
                        </div>
                        


                        <div class="form-group">
                            <label for="name" class="control-label">Item Quantity</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="IT_ITEM_QUANTITY" name="IT_ITEM_QUANTITY" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_DESCRIPTION" name="IT_ITEM_DESCRIPTION" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Remarks</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_REMARKS" name="IT_ITEM_REMARKS" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_STATUS" name="IT_ITEM_STATUS" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Firstclaim Datetime</label>
                            <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" id="IT_ITEM_FIRSTCLAIM_DATETIME" name="IT_ITEM_FIRSTCLAIM_DATETIME" value="" step="any" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Encoder</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_ENCODER" name="IT_ITEM_ENCODER" readonly value="<?php echo $_SESSION['USER_NAME'];?>"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Pic</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_ITEM_PIC" name="IT_ITEM_PIC" value=""  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Form Num</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_FORM_NUM" name="IT_FORM_NUM" value=""  >
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