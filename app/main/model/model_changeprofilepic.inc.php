<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          <!-- For Side info content -->
         <?php include '../../includes/sideinfo_content.inc.php'; ?>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
               <!-- For Card Header -->
            <?php include '../../includes/card_header.inc.php';?>
              <div class="card-body">
                <div class="tab-content">
                 <!-- Tab Panel Change Username and Password-->
                   <div class="active tab-pane" id="changeuserpass">
                    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal" >
                      <input type="hidden" name="empnum" value="<?php echo $empnum; ?>"/>
                      <!-- Username -->
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Profile Picture</label>
                          <div class="col-sm-10">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="file-upload" name="image" onchange="preview()">
                                  <label for="file-upload" class="custom-file-label">Upload Image</label>
                                  <div id="file-upload-filename"></div>
                              </div>
                              </div>
                                <input type="submit" id="submitButton" class="btn btn-danger" hidden><br>
                          </div>
                      </div>
                    </form>
                      <!-- //!.col -->
                      <div class="">
                        <div class="card card-dark">
                          <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools col-md-12">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                              </button>
                              <button id="uploadBtn" class="btn btn-dark" > 
                                <i class="nav-icon fas fa-camera"></i>
                              </button>   
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <img id="thumb1" class="img-circle elevation-2" width="300" height="300"/>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- //!.col -->
                    </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

</div>