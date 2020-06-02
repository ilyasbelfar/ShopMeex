<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span id="prodnamedes"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="close floatnone" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!--delete product -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
                    <h2 class="bold name"></h2>
                </div>
                  </div>
            <div class="modal-footer">
              <button type="button"  data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit"   name="delete"><i class="fa fa-trash"></i> Delete</button>
                  </div>
              </form>
            
        </div>
    </div>
</div>
<!--edit product -->
<div class="modal fade" id="edit">
    <div class="modal-edit modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_edit.php">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group" style="justify-content: space-between;">
                  <div >
                      <label for="edit_name" class=" control-label">Name</label>
                    <input type="text" class="form-control" id="edit_name" name="name">
                  </div>
                <div class=>
                      <label for="edit_category" class="col-sm-1 control-label">Category</label>
                    <select class="form-control" id="editcategory" name="category">
                        <?php
                    try{
                      $stmt = $conn->prepare("SELECT * FROM category");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <option value=".$row['id']."\" selected>".$row['name']."</option>
                            
                           ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div >
                      <label for="edit_price" class="f1 control-label">Price</label>
                    <input type="text" class="form-control" id="edit_price" name="price">
                  </div>
                </div>
                <div class="form-group">
                    
                  <div >
                       <label id="lebel-descr" for="description-text" >description</label>
                    <textarea id="description-text" name="description" rows="10" cols="80"></textarea>
                  </div>
                  
                </div>
            
            <div class="modal-footer-err modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!--new product -->
<div class="modal fade" id="addnew">
    <div class="modal-edit modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Product</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="products_add.php" enctype="multipart/form-data">
                <div class="form-group" style="justify-content: space-between;">
                  <div >
                      <label for="add_name" class=" control-label">Name</label>
                    <input type="text" class="form-control" id="add_name" name="name">
                  </div>
                <div class=>
                      <label for="chosecategory" class="control-label">Category</label>
                    <select class="form-control" id="chosecategory" name="category">
                        <?php
                    try{
                      $stmt = $conn->prepare("SELECT * FROM category");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <option value=".$row['id']."\" selected>".$row['name']."</option>
                            
                           ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                    </select>
                  </div>
                </div>
                <div style="justify-content: space-between" class="form-group">
                  <div >
                      <label for="add_price" class="f1 control-label">Price</label>
                    <input type="text" class="form-control" id="add_price" name="price">
                  </div>
                    <div style="margin: 0 -20px 0 0px" >
                      <label for="photo" class=" control-label">Photo</label>
                    <input style="font-size:.7em" type="file" id="photo" name="photo">
                  </div>
                </div>
                <div class="form-group">
                    
                  <div >
                       <label id="lebel-descr-add" for="add-description-text" >description</label>
                    <textarea id="add-description-text" name="description" rows="10" cols="80"></textarea>
                  </div>
                  
                </div>
            
            <div class=".modal-footer-err modal-footer">
              <button type="button"  data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit"  name="add" ><i class="fa fa-check-square-o"></i> Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!--update photos -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div >
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
               </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                
              </form>
            </div>
        </div>
    </div>
</div>