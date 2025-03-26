        
        
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header bg-dark d-flex justify-content-center">
                <h3 class="card-title ">
                    <a href="addtocart.php" class="btn btn-danger">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-danger"><?php CountAllItems(); ?></span> Cart Section
                    </a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-2">
                <div class=" <?php if(!empty($icon)) { echo $icon . " display-block"; } ?>">
                        <?php if(!empty($content)) { echo $content;  } ?>
                    </div>
                <div class="row">
                    <!-- For the display message -->
                    <?php
                        $product_array = $db_handle->runQuery("SELECT * FROM tblinventory WHERE IT_ITEM_STATUS = 'AVAILABLE' ORDER BY id ASC");
                        if (!empty($product_array)) { 
                            foreach($product_array as $key=>$value){
                                //
                                if(isset($_SESSION['cart_item'])) {
                                    foreach($_SESSION["cart_item"] as $item ) {
                                        $item_sess_name = $item['IT_ITEM_NAME'];
                                        $item_sess_control_number = $item['IT_ITEM_CONTROL_NUMBER'];
                                        $item_sess_quantity = $item['quantity'];
                                    }
                                }  
                                
                                $item_control_number = $product_array[$key]["IT_ITEM_CONTROL_NUMBER"];
                                $item_name = $product_array[$key]["IT_ITEM_NAME"];
                                $item_photo = $product_array[$key]["IT_ITEM_PHOTO"];

                                    if(isset($item_sess_control_number)){
                                        if($item_sess_control_number == $item_control_number){
                                            $item_quantity = $product_array[$key]["IT_ITEM_QUANTITY"] - $item_sess_quantity;
                                        }else {
                                            $item_quantity = $product_array[$key]["IT_ITEM_QUANTITY"];
                                        }
                                    }

                                    else{
                                        $item_quantity = $product_array[$key]["IT_ITEM_QUANTITY"];
                                    }
                                    
                                $item_category = $product_array[$key]["IT_CATEGORY_ITEM"];
                            ?>
                            
                            <form method="post" action="cartrequest.php?action=add&controlNumber=<?php echo $item_control_number; ?>">
                                <div class="card card-outline card-info mr-1 ml-1">
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title">
                                            <?php 
                                                switch($item_category)
                                                    {
                                                        case "Laptop":
                                                            echo "Laptop";
                                                            break;
                                                        case "Peripherals":
                                                            echo "Peripherals";
                                                            break;
                                                        default:
                                                            echo "Others";
                                                            break;
                                                    }
                                             ?>
                                        </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                    </div>

                                    <div class="card-body">
                                        <a href="<?php echo $folder_dir.$item_photo; ?>" data-toggle="lightbox" data-title="<?php echo $item_name; ?>" data-gallery="gallery">
                                            <img height="170" width="170" src="<?php echo $folder_dir.$item_photo; ?>" class="img-fluid ml-4 bg-dark img-cart" alt="image"/>     
                                        </a>

                                       
                                        
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label>Item Name: </label>
                                            </div>
                                            <div class="col-sm-15">
                                                <?php switch($item_name)
                                                    {
                                                        case "Others":
                                                            echo '<input type="text" class="form-control" name="IT_ITEM_NAME" id="IT_ITEM_NAME" value="'.$item_name.'"  required>';
                                                            break;
                                                        default:
                                                            echo '<input type="text" class="border-0" name="IT_ITEM_NAME" id="IT_ITEM_NAME" value="'.$item_name.'"  readonly>';
                                                            break;
                                                    }?>
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col">
                                                <label>Control Number: </label>
                                            </div>
                                            <div class="col-sm-15">
                                                <?php switch($item_name)
                                                    {
                                                        case "Others":
                                                            echo '<input type="text" class="form-control" name="IT_ITEM_CONTROL_NUMBER" id="IT_ITEM_CONTROL_NUMBER" value="'.$item_control_number.'" required>';
                                                            break;
                                                        default:
                                                            echo '<input type="text" class="border-0" name="IT_ITEM_CONTROL_NUMBER" id="IT_ITEM_CONTROL_NUMBER" value="'.$item_control_number.'" readonly>';
                                                            break;
                                                    }?>
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-sm-5">
                                                <label>Quantity Left: </label>
                                            </div>
                                            <div class="col">
                                                <?php switch($item_name)
                                                    {
                                                        case "Others":
                                                            echo '';
                                                            break;
                                                        default:
                                                            echo $item_quantity;
                                                            break;
                                                    }?>
                                            </div>
                                        </div>
              

                                        <div class="row mt-1">
                                            <div class="col-sm-10">
                                                <input <?php echo ($item_quantity == 0) ? "disabled" : " " ; ?> type="number" class="form-control" min=0 name="quantity" value="<?php echo ($item_control_number == "None") ? 0 : $item_quantity ; ?>" size="2" max="<?php echo ($item_control_number == "None") ? '': $item_quantity; ?>"/>
                                            </div>
                                            
                                            <div class="col-sm-2 ">
                                                <button <?php echo ($item_quantity == 0) ? "disabled" : " " ; ?> type="submit" class="btnAddAction" id="btnAddAction" /><i class="fas fa-plus-circle"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>
                            </form>
                        <?php
                             
                              
                            }
                        }
                        ?>
                    </div>
                <div>
            <div>
        </div>
    </section>

   
