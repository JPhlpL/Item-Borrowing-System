<?php 
// List all items
$displayAllItems = "SELECT * FROM tblinventory WHERE IT_ITEM_STATUS = 'AVAILABLE' AND IT_ITEM_NAME != 'Others'";
$displayQuery = mysqli_query($link,$displayAllItems);
$displayItem = mysqli_fetch_array($displayQuery);

?>

<div class="modal fade" id="availableItems">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content ">
        <div class="modal-header bg-secondary">
          <h4 class="modal-title">Available Resources</h4>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div class="row mt-4">
                <?php 
            
                    if($result = mysqli_query($link, $displayAllItems)){

                        if(mysqli_num_rows($result) > 0 ){
            
                            while($displayItem = mysqli_fetch_array($result)){ ?>

                            <div class="col-md-3">
                                <div class="card card-outline card-info">
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title"></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <a href="<?php echo $folder_dir.$displayItem['IT_ITEM_PHOTO'];?>" data-toggle="lightbox" data-title="<?php echo $displayItem['IT_ITEM_NAME'];?>" data-gallery="gallery">
                                            <img height="170" width="170" src="<?php echo $folder_dir.$displayItem['IT_ITEM_PHOTO'];?>" class="img-fluid ml-4 bg-dark " alt="white sample"/>     
                                        </a>
                                        <div class="mt-4">
                                            <label>Item Name: </label>
                                            <?php echo $displayItem['IT_ITEM_NAME'];?>
                                        </div>
                                        <div class="mt-1">
                                            <label>Control No. </label>
                                            <?php echo $displayItem['IT_ITEM_CONTROL_NUMBER'];?>
                                        </div>
                                        <div class="mt-1">
                                            <label>Quantity: </label>
                                            <?php echo $displayItem['IT_ITEM_QUANTITY'];?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    
                        <?php }
                            mysqli_free_result($result);
                        }
                        else { 
                            return false; 
                        }
                    }
                    else{ 
                        echo "ERROR: Could not able to execute $displayAllItems. " . mysqli_error($link); 
                    }
                    // Close connection
                    mysqli_close($link);
                ?>
            </div>
        </div>
      </div>
    </div>
  </div>
