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
              <!-- Tab Panel Update Bio-->
              <div class="active tab-pane">
               <form>

                   <!-- Employee_num -->
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Employee No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Employee_num" name="Employee_num" value="<?php echo $profileData['USER_EMPLOYEE_ID'];?>" readonly>
                    </div>
                  </div>

                  <!-- Personal Info -->
                  <div class="col">
                    <div class="card card-outline card-primary">
                      <div class="card-header">
                        <h3 class="card-title"><label class="col-form-label">Personal Info</label></h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>                       
                      </div>                    
                      <div class="card-body">
                        <!-- Name -->
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $profileData['USER_NAME'];?>">
                          </div>
                        </div>
                      <!-- Gender -->
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <?php 
                              $sql = mysqli_query($link, "SELECT gender From tblgender ");
                              $row = mysqli_num_rows($sql);
                              // For Disabled if Failed
                              echo "<select name=\"gender\" id=\"gender\" class=\"form-control form-select input-panel\">";
                              while ($row = mysqli_fetch_array($sql)){
                              $selected = $profileData['USER_GENDER'] == $row['gender'] ? ' selected' : ''; // To get the selected value display in option    
                              echo "<option value='". $row['gender'] ."'". $selected .">" . $row['gender'] ."</option>" ;}
                              echo " </select>"; 
                            ?>     
                          </div>
                        </div>
                      <!-- Email -->
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $profileData['USER_EMAIL'];?>">
                          </div>
                        </div>
                        <!-- Cellphone Number -->
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Mobile No.</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="cpnum" name="cpnum" placeholder="Ex: 09498910387" value="<?php echo $profileData['USER_MOBILE'];?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Current Job Role -->
                  <div class="col">
                    <div class="card card-outline card-danger">
                      <div class="card-header">
                        <h3 class="card-title"><label class="col-form-label">Current Job Role</label></h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>      
                      </div>
                      <div class="card-body">
                       
                        <!-- Position -->
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Position" name="Position" value="<?php echo $profileData['USER_POSITION'];?>">
                        </div>
                      </div>

                        <!-- Department -->
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Department</label>
                          <div class="col-sm-10">
                            <?php 
                              $sql = mysqli_query($link, "SELECT dept From tbldept ");
                              $row = mysqli_num_rows($sql);
                              // For Disabled if Failed
                              echo "<select name=\"Dept\" id=\"Dept\" class=\"form-control form-select input-panel\">";
                              while ($row = mysqli_fetch_array($sql)){
                              $selected = $profileData['USER_DEPT'] == $row['dept'] ? ' selected' : ''; // To get the selected value display in option    
                              echo "<option value='". $row['dept'] ."'". $selected .">" . $row['dept'] ."</option>" ;}
                              echo " </select>"; 
                            ?>     
                          </div>
                        </div>

                        <!-- Section -->
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Section</label>
                          <div class="col-sm-10">
                          <?php 
                              $sql = mysqli_query($link, "SELECT section From tbldept ");
                              $row = mysqli_num_rows($sql);
                              // For Disabled if Failed
                              echo "<select name=\"Section\" id=\"Section\" class=\"form-control form-select\">";
                              echo "<option value=''>" ."Please Select"."</option>" ;
                              while ($row = mysqli_fetch_array($sql)){
                                $selected = $profileData['USER_SECTION'] == $row['section'] ? ' selected' : ''; // To get the selected value display in option    
                              echo "<option value='". $row['section'] ."'". $selected .">" . $row['section'] ."</option>" ;}
                              echo " </select>"; 
                            ?>     
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- Checkbox -->
                  <div class="col">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="checkbox" id="termbox" /> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                  </div>
                  <!-- Submit -->
                  <div class="col">
                      <button id="submitBtn" class="submitbtn btn btn-danger" disabled="disabled"> Submit </button>
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
<!-- /.content -->

</div>