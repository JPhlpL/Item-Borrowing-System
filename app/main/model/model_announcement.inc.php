<section class="content">
  <?php if($_SESSION['USER_ACCOUNT_TYPE'] !==3) { ?>
  <form id="announce" name="announce">
    <div class="card">
      <div class="card-body">
          <div class="post">
                <input type="hidden" name="name" id="name" value="<?php echo $profileData['USER_NAME']; ?>">
                <textarea class="form-control form-control-sm" id="announcementContent"></textarea>
                <p>
                  <span class="float-left">
                    <button id="announcementBtn" class="btn btn-secondary"> Share </button>
                  </span>
                </p>
          </div>
      </div>
    </div>
  </form>
  <?php } ?>

      <!-- Display -->
      <?php 
        $displaySql = 
        "SELECT a.id aId, a.ANNOUNCE_NAME aName, a.ANNOUNCE_CONTENT aContent, a.ANNOUNCE_DATETIME aDateTime, b.USER_PIC uPic
         FROM tblannouncement a 
         JOIN tbluser b 
         ON a.ANNOUNCE_NAME = b.USER_NAME
         ORDER BY a.ANNOUNCE_DATETIME DESC";
        $displayQuery = mysqli_query($link,$displaySql);
        $displayRow = mysqli_fetch_array($displayQuery);

        global $displayRow;

        if($displayQuery = mysqli_query($link, $displaySql)){
          while($displayRow = mysqli_fetch_array($displayQuery)){?>
        <div class="card">
          <div class="card-header"> 
            <h3 class="card-title">
              <div class="user-block">
                <?php echo '<img class="img-circle img-bordered-sm" src="data:image/jpeg;base64,'.base64_encode( $displayRow['uPic'] ).'"/>'; ?>
                <span class="username">
                  <a> <?php echo $displayRow['aName']; ?> </a>
                  </span>
                  <span class="description">
                    <?php 
                    $timestamp = $displayRow['aDateTime'];
                    $splitTimeStamp = explode(" ",$timestamp);
                    $date =  date('F d, Y',strtotime($splitTimeStamp[0]));
                    $time = date('h:iA', strtotime($splitTimeStamp[1]));
                    echo $date." at ".$time 
                    ?>
                    <i class="fas fa-globe-asia"></i>
                  </span> 
              </div>
            </h3>

            <div class="card-tools">
              <?php if($displayRow['aName'] == $_SESSION['USER_NAME']) { ?>
              <a href="javascript:void(0)"  title="Delete Post" data-toggle="tooltip\ title=\Delete Data" id="deleteAnnouncement" class="btn btn-tool" data-id="<?php echo $displayRow['aId'];?>"> 
                <i class="fas fa-trash"></i>
              </a>
              <?php } ?>
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>

          </div>
          <div class="card-body">
              <div class="post">
                <p><?php echo $displayRow['aContent']; ?></p> 
                <p>
                  <a href="#" class="link-black text-sm mr-2 disabled"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm disabled"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                  <span class="float-right">
                    <?php echo '<a href="comment.php?'.$displayRow['aId'].'" class="link-black text-sm">'; ?>
                      <i class="far fa-comments mr-1"></i> Replies:
                      <?php  
                      $count_comment_sql = "SELECT COUNT(*) AS total_comment FROM tblcomment WHERE COMMENT_ANNOUNCE_ID = '".$displayRow['aId']."'";
                      $count_query = mysqli_query($link,$count_comment_sql);
                      $count_all_comment = mysqli_fetch_array($count_query);
                      $countComment = $count_all_comment['total_comment'];
                      echo $countComment;
                       ?>
                    </a>
                  </span>
                </p>
              </div>
              <!-- Post -->
          </div>
          <div class="card-footer"></div>
        </div>
        <?php }
          } ?>
      <!-- Display -->
    </div>
</section>
    