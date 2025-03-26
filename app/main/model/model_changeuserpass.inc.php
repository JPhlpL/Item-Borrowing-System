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

                    <form class="form-horizontal">

                    <input type="hidden" name="empnum" id="empnum" value="<?php echo $profileData['USER_EMPLOYEE_ID'] ?>"/>

                    <!-- Username -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" value="<?php echo $profileData['USER_ID'] ?>" name="username" disabled>
                        </div>
                      </div>

                
                    <!-- Password -->
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" autocomplete="on" class="form-control pass-key" id="password" name="password" required placeholder="Password">
                          <span class="passwordshow"><span id="show-pass" class="fas fa-eye show"></span></span>
                          <span class="help-block"></span>
                        </div>
                      </div>

                       <!-- Confirm Password -->
                       <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                        <input type="password" autocomplete="on" class="form-control confirm-pass-key" id="confirm_password" name="confirm_password" required placeholder="Password">
                          <span class="confirm-passwordshow"><span id="confirm-showpass" class="fas fa-eye show"></span></span>
                          <span class="help-block"></span>
                        </div>
                      </div>

                      <!-- Submit -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit"  id="changebtn" class="btn btn-danger" disabled="disabled">
                        </div>
                      </div>

                     <!-- Password Validation -->
                     <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                       Password Match: <span id='message'></span> <br><br>
                       Password Strength: <span id='pass_status'></span>
                        </div>
                      </div>

                    </form>

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