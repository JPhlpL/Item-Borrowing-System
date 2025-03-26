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
                    <form id="update-form" name="update-form" class="form-horizontal" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id">
                        <input type="hidden" class="form-control" id="mode" name="mode" value="update">

                        <div class="custom-file">
                            <input type="file" id="upload_file" name="upload_file" class="custom-file-input">
                            <label class="custom-file-label" for="upload_file">Choose file</label>
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