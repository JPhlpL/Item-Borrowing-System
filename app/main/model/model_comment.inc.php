<section class="content">
    <!-- Display -->
    <?php 
    $displaySql = 
    "SELECT a.id aId, a.ANNOUNCE_NAME aName, a.ANNOUNCE_CONTENT aContent, a.ANNOUNCE_DATETIME aDateTime, b.USER_PIC uPic
        FROM tblannouncement a 
        JOIN tbluser b 
        ON a.ANNOUNCE_NAME = b.USER_NAME
        WHERE a.id = '$param_id'
        ORDER BY a.ANNOUNCE_DATETIME DESC";
    $displayQuery = mysqli_query($link,$displaySql);
    $displayRow = mysqli_fetch_array($displayQuery);
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
                  <a href="#" class="link-black text-sm mr-2 disabled"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm disabled"><i class="far fa-thumbs-up mr-1"></i> Like</a>
              </div>
              <?php }
            } ?>
              <!-- Post -->
          </div>
          <div class="card-footer"></div>
        </div>
      <!-- Display -->

      <!-- Comment Box -->
      <form id="announce" name="announce">
            <div class="card">
                <div class="card-header"> 
                <h3 class="card-title">
                    <div class="user-block">
                        Reply:
                    </div>
                </h3>

                <div class="card-tools">
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
                        <input type="hidden" name="comment_name" id="comment_name" value="<?php echo $user_name;?>">
                        <input type="hidden" name="comment_announce_id" id="comment_announce_id" value="<?php echo $param_id;?>" />
                        <textarea id="commentContent" name="commentContent"></textarea>
                        <p>
                        <span class="float-left">
                            <button id="commentBtn" name="commentBtn" class="btn btn-secondary"> Comment </button>
                        </span>
                        </p>
                </div>
            </div>
            </div>
        </form>
        <!-- Comment Box -->

      <!-- Display -->
    <?php 
    $display_commentSql = 
    "SELECT a.id aId, a.COMMENT_ANNOUNCE_ID aCAID, a.COMMENT_NAME aCN, a.COMMENT_CONTENT aCC, a.COMMENT_DATETIME aCDT, b.USER_PIC uPic
        FROM tblcomment a 
        JOIN tbluser b 
        ON a.COMMENT_NAME = b.USER_NAME
        WHERE a.COMMENT_ANNOUNCE_ID = '$param_id'
        ORDER BY a.COMMENT_DATETIME DESC";
        $display_commentQuery = mysqli_query($link,$display_commentSql);
        $display_commentRow = mysqli_fetch_array($display_commentQuery);
        if($display_commentQuery = mysqli_query($link, $display_commentSql)){
          while($display_commentRow = mysqli_fetch_array($display_commentQuery)){?>
        <div class="card">
          <div class="card-header"> 
            <h3 class="card-title">
              <div class="user-block">
                <?php echo '<img class="img-circle img-bordered-sm" src="data:image/jpeg;base64,'.base64_encode( $display_commentRow['uPic'] ).'"/>'; ?>
                <span class="username">
                  <a> <?php echo $display_commentRow['aCN']; ?> </a>
                  </span>
                  <span class="description">
                    <?php 
                    $timestamp = $display_commentRow['aCDT'];
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
              <?php if($display_commentRow['aCN'] == $_SESSION['USER_NAME']) { ?>
              <a href="javascript:void(0)"  title="Delete Post" data-toggle="tooltip\ title=\Delete Data" id="deleteComment" class="btn btn-tool" data-id="<?php echo $display_commentRow['aId'];?>"> 
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
                <p><?php echo $display_commentRow['aCC']; ?></p> 
                  <a href="#" class="link-black text-sm mr-2 disabled"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm disabled"><i class="far fa-thumbs-up mr-1"></i> Like</a>
              </div>
            
              <!-- Post -->
          </div>
          <div class="card-footer"></div>
        </div>
        <?php }
            } ?>

    </div>
</section>
    