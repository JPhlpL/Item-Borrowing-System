<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="../../../dist/img/system.jpg" alt="AdminLTE Logo" style="height:35px;width:35px;border-radius:3px;">
    <?php //echo $systemLogo; ?>
    <span class="brand-text font-weight-light ml-1">Welcome!</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      <?php
        echo '<img alt="User Image" class="img-circle elevation-2" src="data:image/jpeg;base64,'.base64_encode( $profileData['USER_PIC'] ).'"/>';
        ?>
      </div>
      <div class="info">
        <a href="timeline.php" class="d-block"><?php echo $_SESSION['USER_NAME']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

       <!-- Dashboard (MAIN) -->
       <!-- User = 1   -->
      <?php if($_SESSION['USER_ACCOUNT_TYPE'] !== 3) {?>
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link <?php echo (param_title() == "dashboard.php") ? " active" : " "; ?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
             Dashboard
          </p>
        </a>
      </li>
      <?php } ?>

      <!-- News Feed (MAIN) -->
      <li class="nav-item">
        <a href="announcement.php" class="nav-link <?php echo (param_title() == "announcement.php" || param_title() == "comment.php") ? " active" : " "; ?>">
          <i class="nav-icon fas fa-newspaper"></i>
          <p>
             Announcement
          </p>
        </a>
      </li>

      
      
        <li class="nav-item <?php echo $menuSetRequest; ?>">
            <a href="#" class="nav-link <?php echo $navLinkRequest; ?>">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                 Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="cartrequest.php" class="nav-link <?php echo (param_title() == "cartrequest.php" || param_title() == "addtocart.php") ? " active" : " "; ?>">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                      Create Request
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="tblrequest.php" class="nav-link <?php echo (param_title() == "tblrequest.php" || param_title() == "addRequestForm.php" || param_title() == "viewRequestForm.php" || param_title() == "editRequestForm.php") ? " active" : " "; ?>">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      List of Request
                    </p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="tblrequest.php" data-target="#availableItems" data-toggle="modal" title="See All Items" class="nav-link">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>
                    Available Resources
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </li>
          
      

     
      <!-- User = 1   -->
      <?php if($_SESSION['USER_ACCOUNT_TYPE'] !== 3) {?>
        <li class="nav-item">
          <a href="tblinventory.php" class="nav-link <?php echo (param_title() == "tblinventory.php" || param_title() == "addMultipleItem.php" || param_title() == "inventoryUpload.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
              Inventory
            </p>
          </a>
        </li>
       <li class="nav-item">
        <a href="tblapprove.php" class="nav-link <?php echo (param_title() == "tblapprove.php" || param_title() == "approveRequestForm.php" || param_title() == "returnRequestForm.php") ? " active" : " "; ?>">
          <i class="nav-icon fas fa-user-check"></i>
          <p>
             Approver Table
          </p>
        </a>
      </li>
      <?php } ?>

        <!-- Calendar Table -->
        <li class="nav-item">
          <a href="calendar.php" class="nav-link <?php echo (param_title() == "calendar.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Calendar
            </p>
          </a>
        </li>

      <!-- System Manual -->
      <li class="nav-item">
          <a href="manual.php" class="nav-link <?php echo (param_title() == "manual.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              System Manual
            </p>
          </a>
        </li>

       <!-- Contacts Page -->
       <li class="nav-item">
          <a href="contacts.php" class="nav-link <?php echo (param_title() == "contacts.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Contacts
            </p>
          </a>
        </li>

      <!-- Ask Support -->
      <li class="nav-item">
          <a href="support.php" class="nav-link <?php echo (param_title() == "support.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Ask Support 
            </p>
          </a>
        </li>

      <!-- About -->
      <li class="nav-item">
          <a href="about.php" class="nav-link <?php echo (param_title() == "about.php") ? " active" : " "; ?>">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              About 
            </p>
          </a>
        </li>

         <!-- User = 0   -->
      <?php if($_SESSION['USER_ACCOUNT_TYPE'] == '0') {?>
          <li class="nav-item <?php echo $menuSet; ?>">
            <a href="#" class="nav-link <?php echo $navLink; ?>">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Admin Tools
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- User Management  -->
              <li class="nav-item">
                <a href="userManagement.php" class="nav-link font-italic
                <?php echo (param_title() =="userManagement.php") ? " active" : " "; ?>">
                  <i class="nav-icon fas fa-users"></i>
                    <span class="badge badge-light right">
                      <?php countAllUsers($link); ?>
                      </span>
                  <p>
                    User Management
                  </p>

                </a>
              </li>
              <!-- Email Configuration  -->
              <li class="nav-item">
                <a href="emailConfig.php" class="nav-link font-italic
                <?php echo (param_title() =="emailConfig.php") ? " active" : " "; ?>">
                  <i class="nav-icon fas fa-mail-bulk"></i>
                  <p>
                    Email Configuration
                  </p>
                </a>
              </li>
              <!-- System Configuration  -->
              <li class="nav-item">
                <a href="systemConfig.php" class="nav-link font-italic
                <?php echo (param_title() =="systemConfig.php") ? " active" : " "; ?>">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    System Configuration
                  </p>
                </a>
              </li>
              <li class="nav-item <?php echo (param_title() =="toDoList.php" || param_title() =="fileManagement.php" || param_title() =="tblfiles.php" || param_title() =="tbltoDoList.php" || param_title() =="viewToDoList.php") ? " menu-open" : "menu"; ?>">
              <a href="#" class="nav-link font-italic <?php echo (param_title() =="toDoList.php" || param_title() =="fileManagement.php" || param_title() =="tblfiles.php" || param_title() =="tbltoDoList.php" )|| param_title() =="viewToDoList.php" ? " active" : " "; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Personal Documents
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item <?php echo (param_title() =="toDoList.php" || param_title() =="tbltoDoList.php" || param_title() =="viewToDoList.php") ? " menu-open" : "menu"; ?>">
                  <a href="#" class="nav-link font-italic <?php echo (param_title() =="toDoList.php" || param_title() =="tbltoDoList.php" || param_title() =="viewToDoList.php") ? " active" : " "; ?>">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                    To-Do List
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="tbltoDoList.php" class="nav-link font-italic <?php echo (param_title() =="tbltoDoList.php" || param_title() =="viewToDoList.php") ? " active" : " "; ?>">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>List of Reminders</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="toDoList.php" class="nav-link font-italic <?php echo (param_title() =="toDoList.php") ? " active" : " "; ?>">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Add To-Do List</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item <?php echo (param_title() =="fileManagement.php" || param_title() =="tblfiles.php") ? " menu-open" : "menu"; ?>">
                  <a href="#" class="nav-link font-italic <?php echo (param_title() =="fileManagement.php" || param_title() == "tblfiles.php") ? " active" : " "; ?>">
                    <i class="nav-icon fas fa-upload"></i>
                    <p>
                    File Management
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="tblfiles.php" class="nav-link font-italic <?php echo (param_title() =="tblfiles.php") ? " active" : " "; ?>">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>List of Files</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="fileManagement.php" class="nav-link font-italic <?php echo (param_title() == "fileManagement.php") ? " active" : " "; ?>">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Upload Files</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      <?php } ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
