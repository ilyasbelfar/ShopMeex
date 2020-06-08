<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_add.php">
                <input type="hidden" class="userid" name="id">
                <div style="padding: 0 10px;"class="form-group">
                    <label style="padding: 5px;font-size: .9em;font-weight: 700;" for="product" >Product</label>
   
                    <div class="input">
                      <select style="width: 100%;padding: 5px;" class="form-control select2" style="width: 100%;" name="product" id="product" required>
                        <option value="" selected>- Select -</option>
                          $conn = $pdo->open();

                      </select>
                    </div>
                </div>
                <div style="padding: 0 10px;" class="form-group">
                    <label style="font-size: .9em;font-weight: 600;padding: 3px;" for="quantity" >Quantity</label>

                    <div class="input">
                      <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
                    </div>
                </div>
            <div class="modal-footer">
              <button style="border:0; outline:0" type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="productname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_edit.php">
                <input type="hidden" class="cartid" name="cartid">
                <input type="hidden" class="userid" name="userid">
                <div class="form-group">
                    <label for="edit_quantity" class="col-sm-3 control-label">Quantity</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_quantity" name="quantity">
                    </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_delete.php">
                <input type="hidden" class="cartid" name="cartid">
                <input type="hidden" class="userid" name="userid">
                <div class="text-center">
                    <p style="text-align: center;font-size: .8em;padding: 10px;">DELETE PRODUCT</p>
                    <h2 class="productname" style="text-align: center;padding: 10px;">Dell Laptop 1500 Pavilion</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border:0" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit"  name="delete"><i class="fa fa-trash"></i> Delete</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
