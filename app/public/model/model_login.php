<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-secondary">
      <div class="card-header text-center">
        <b class="h1">Sign-in</b>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><?php echo $systemTitleHeader; ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="input-group mb-4">
            <input type="text" name="username" class="form-control" required placeholder="Username" value="<?php echo $username; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <span class="text-danger"><?php echo $username_err; ?></span>
          </div>

          <div class="input-group mb-4">
            <input type="password" name="password" class="form-control pass-key" required placeholder="Password" value="<?php echo $password; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span id="show" class="fas fa-eye show"></span>
              </div>
            </div>
            <span class="text-danger"><?php echo $password_err; ?></span>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" class="btn btn-secondary btn-block" value="Sign In"/>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="text-center mt-2 mb-3">
          <a href="register.php" class="btn btn-block btn-secondary">
             Register
          </a>
          <!-- //! Work with forgot password -->
          <a href="forgot-password.php" class="btn btn-block btn-secondary"> 
             Forgot Password
          </a>
          <div class="row mt-2">
            <div class="col">
              <a href="../../../copyright.md" class="btn btn-block btn-secondary" target="_blank"> 
                Copyright
              </a>
            </div>
            <div class="col">
              <a href="../../../readme.md" class="btn btn-block btn-secondary" target="_blank"> 
                Read Me First
              </a>
            </div>
          </div>
        </div>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->