<!-- Profile Image -->
<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                   <?php    
                    echo '<img alt="User Image" class="user-image-profile img-circle img-fluid elevation-2" src="data:image/jpeg;base64,'
                    .base64_encode( $profileData['USER_PIC'] ).'"/>'; 
                   ?>       
                </div>
                <h3 class="profile-username text-center">
                    <?php echo ucwords(strtolower($profileData['USER_NAME'])); ?>
                </h3>
                <p class="text-muted text-center"><?php echo $profileData ['USER_POSITION'];?></p>
                <ul class="counter list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Notifications</b> <a class="float-right">0</a>
                  </li>
                  <li class="list-group-item">
                    <b>Pending </b> <a class="float-right">0</a>
                  </li>
                </ul>           
              </div>
            </div>

           
          