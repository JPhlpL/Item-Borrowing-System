<div class="container mt-5">
        <div class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#account-login-part">
                <div class="step-trigger" role="tab" aria-controls="account-login-part" id="account-login-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Account Login</span>
                </div>
            </div>
            <div class="line"></div>
            <!-- Division -->
            <div class="step" data-target="#information-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Personal information</span>
                </button>
            </div>
            <div class="line"></div>
            <!-- Division -->
            <div class="step" data-target="#image-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Upload Profile Picture</span>
            </button>
            </div>
            <div class="line"></div>
            <!-- Division -->
            <div class="step" data-target="#confirmation-part" >
            <button type="button" class="step-trigger" role="tab" aria-controls="confirmation-part" id="confirmation-part-trigger">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Confirmation</span>
            </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form novalidate name="registerload" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
                <!-- your steps content here -->
                <div id="account-login-part" class="content" role="tabpanel" aria-labelledby="account-login-part-trigger">
                        <div class="mb-3">
                            <label class="icon" for="name"><i class="fas fa-user"></i></label>
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="icon" for="name"><i class="fas fa-shield"></i></i></label>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" autocomplete="on" class="form-control pass-key" id="password" name="password" required placeholder="Password">                            
                            <div class="input-group-append float-end">
                                <button class="btn btn-outline-secondary rounded-right eyeicon" type="button"><span id="show" class="show fas fa-eye "></span></button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="icon" for="name"><i class="fas fa-shield"></i></label>
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" autocomplete="on" class="form-control con_pass-key" id="confirm_password" name="confirm_password" required placeholder="Confirm Password">
                        </div>
                        <div class="input-group-append float-end">
                            <button class="btn btn-outline-secondary rounded-right eyeicon2" type="button"><span id="con_show" class="con_show fas fa-eye "></span></button>
                        </div>
                           <div class="mt-2">
                            <div class="col">
                              <div>
                                <a href="login.php" class="btn btn-outline-dark"> Back</a>
                                <button type="button" class="btn btn-outline-dark" onclick="stepper.next()">Next</button>
                              </div>
                            </div>
                          </div>
                </div>
                
                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="mb-3">
                            <label class="icon" for="name"><i class="fas fa-id-badge"></i></label>
                            <label class="form-label">Employee No.</label>
                            <input type="text" id='empnum' onkeyup="GetDetail(this.value)" name="empnum" placeholder="Enter your employee number" 
                             class="form-control form-control-sm" required>
                        </div>
                        <div class="mb-3">
                            <label class="icon" for="name"><i class="far fa-user"></i></label>
                            <label class="form-label">Name</label>
                            <input type="text" id='name' name="name" placeholder="Enter your name" class="form-control form-control-sm" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="icon" for="name"><i class="far fa-user"></i></label>
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id='email' placeholder="Enter your email" class="form-control form-control-sm" required>
                            </div>
                            <div class="col">
                                <label class="icon" for="name"><i class="far fa-user"></i></label>
                                <label class="form-label">Mobile No.</label>
                                <input type="text" name="mobile" id='mobile' placeholder="Enter your mobile" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="row gx-2 mb-3">
                            <div class="col">
                                <label class="icon" for="name"><i class="fas fa-building"></i></label>
                                <label class="form-label">Department</label>
                                <select id='dept'name="dept" class="form-control form-control-sm" required>
                                  <option value=""> </option>
                                  <?php 
                                  $sql = mysqli_query($link, "SELECT dept From tbldept");
                                  $row = mysqli_num_rows($sql);
                                  while ($row = mysqli_fetch_array($sql)){
                                  echo "<option value='". $row['dept'] ."'>" .$row['dept'] ."</option>" ;}?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="icon" for="name"><i class="fas fa-flag"></i></label>
                                <label class="form-label">Section</label>
                                <select id='section'name="section" class="form-control form-control-sm" required>
                                  <option value=""> </option>
                                  <?php 
                                  $sql = mysqli_query($link, "SELECT section From tbldept");
                                  $row = mysqli_num_rows($sql);
                                  while ($row = mysqli_fetch_array($sql)){
                                  echo "<option value='". $row['section'] ."'>" .$row['section'] ."</option>" ;}?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="icon" for="name"><i class="fas fa-briefcase"></i></label>
                                <label class="form-label">Position</label>
                                <input type="text" id='position' name="position" placeholder="Enter your position" class="form-control form-control-sm" required>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="col">
                              <div>
                                  <button type="button" class="btn btn-outline-dark" onclick="stepper.previous()">Back</button>
                                  <button type="button" class="btn btn-outline-dark" onclick="stepper.next()">Next</button>
                                </div>
                              </div>
                            </div>
                          </div>
                </div>
            
                <div id="image-part" class="content" role="tabpanel" aria-labelledby="image-part-trigger">
                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" class="form-control form-control-sm" name="image" onchange="preview()">
                    </div>
                    <a onClick='window.open("opencamera.php","OpenCamera","width=450,height=380")' class="btn btn-primary btn-sm mb-3"><i class="fas fa-camera"></i> Take a snapshot</a>
                    <div class="mb-3">
                        <img id="thumb1" class="border rounded-circle" width="150" height="150" />
                    </div>
                    <div class="mt-2">
                        <div class="row">
                          <div>
                            <button type="button" class="btn btn-outline-dark" onclick="stepper.previous()">Back</button>
                            <button type="button" class="btn btn-outline-dark" onclick="stepper.next()">Next</button>
                          </div>
                        </div>
                      </div>
                </div>

                <div id="confirmation-part" class="content" role="tabpanel" aria-labelledby="confirmation-part-trigger">
                    <div class="mb-3">
                        <p class="form-label">Are you sure you want to submit?</label>
                    </div>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                    </div>
                    <div class="mt-2">
                        <div class="row">
                          <div>
                            <button type="button" class="btn btn-outline-dark" onclick="stepper.previous()">Back</button>
                            <input type="submit" class="btn btn-outline-dark" value="Submit">
                          </div>
                        </div>
                      </div>
                </div>
            </form> 
        </div>
</div>