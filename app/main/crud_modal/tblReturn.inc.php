<div class="modal fade" id="edit-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">

              <h4 class="modal-title" id="userCrudModal"> Return Item </h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                  <div class="modal-body">
                    <form id="update-form" name="update-form" class="form-horizontal" method="post">
                      <input type="hidden" name="id" id="id">
        
                        <input type="hidden" class="form-control" id="mode" name="mode" value="update">

                        <div class="form-group">
                            <label for="name" class="control-label">Control Number</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_REQUEST_CONTROL_NUMBER" name="IT_REQUEST_CONTROL_NUMBER" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Item Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_REQUEST_ITEM_NAME" name="IT_REQUEST_ITEM_NAME" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Transaction ID</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="IT_REQUEST_TRANSACTION_ID" name="IT_REQUEST_TRANSACTION_ID" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Returning Item Quantity</label>
                            <div class="col-sm-12">
                                <input type="number" max="IT_REQUEST_ITEM_QUANTITY" class="form-control" id="IT_REQUEST_ITEM_QUANTITY" name="IT_REQUEST_ITEM_QUANTITY" value="" required>
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