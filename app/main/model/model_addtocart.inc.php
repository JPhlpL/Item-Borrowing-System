        
        
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header bg-dark d-flex justify-content-center">
                <h3 class="card-title ">
                    <a href="cartrequest.php" class="btn btn-success">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                            Go Back <span class="badge badge-success"><?php CountAllItems(); ?></span>
                    </a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-2">
            <?php
                if(isset($_SESSION["cart_item"])){
                    $total_quantity = 0;
                ?>	
                <form>
                    <div class = "row">
                        <div class="col">
                            <label class="form-label">Control No.</label>
                            <input type="text" class="form-control" name="IT_TRANSACTION_ID" id="IT_TRANSACTION_ID" value="<?php echo $currentTransactID; ?>" readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="IT_BORROWER_NAME" id="IT_BORROWER_NAME" value="<?php echo $_SESSION['USER_NAME']; ?>" readonly>
                        </div>
                    </div>
                        <table class="table table-bordered table-hover mt-2 border border-info rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="text-align:left;">Item Name</th>
                                    <th style="text-align:left;">Control Number</th>
                                    <th style="text-align:right;" width="5%">Quantity</th>
                                    <th style="text-align:center;" width="5%">Remove</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION["cart_item"] as $item){ ?>
                                    <tr>
                                        <td>
                                            <a class="text-dark" href="<?php echo $folder_dir.$item["IT_ITEM_PHOTO"]; ?>" data-toggle="lightbox" data-title="<?php echo $item["IT_ITEM_NAME"]; ?>">
                                                <img src="<?php echo $folder_dir.$item["IT_ITEM_PHOTO"]; ?>" class="cart-item-image" /><?php echo $item["IT_ITEM_NAME"]; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $item["IT_ITEM_CONTROL_NUMBER"]; ?>
                                        </td>
                                        <td style="text-align:right;">
                                            <?php echo $item["quantity"]; ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="addtocart.php?action=remove&controlNumber=<?php echo $item["IT_ITEM_CONTROL_NUMBER"]; ?>" class="btnRemoveAction">
                                                <i class="fas fa-trash text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $total_quantity += $item["quantity"];
                                    }
                                    ?>
                                <tr class="bg-dark">
                                    <td colspan="2" align="right">Total:</td>
                                    <td align="right"><?php echo $total_quantity; ?></td>
                                    <td align="center">
                                        <a href="addtocart.php?action=empty">
                                            <i class="fas fa-trash text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Date From </label>
                                <input type="date" class="form-control" name="IT_DATE_FROM" id="IT_DATE_FROM">
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Date To</label>
                                <input type="date" class="form-control" name="IT_DATE_TO" id="IT_DATE_TO">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Remarks </label>
                                <textarea class="form-control" name="IT_REMARKS" id="IT_REMARKS"></textarea>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Purposes</label>
                                <textarea class="form-control" name="IT_PURPOSE" id="IT_PURPOSE"></textarea>
                            </div>
                        </div>

                    <!-- this row will not appear when printing -->
                    <div class="row justify-content-between">
                        <div class="col-3 no-print">
                            <a onclick=window.print() rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        </div>
                        <div class="col-2t">
                            <a href="cartrequest.php" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left text-danger"></i> Go Back</a>
                            <button type="submit" id="cartBtn" name="Approve" class="btn btn-default"><i class="fas fa-shopping-cart text-success"></i> Checkout </button>
                        </div>
                    </div>		
                    <?php
                    } else {
                    ?>
                        <div class="no-records">Your Cart is Empty</div>
                    </form>
                    <?php 
                    }
                ?>
                <!--  -->
            <div>
        <div>
    </div>
</section>
