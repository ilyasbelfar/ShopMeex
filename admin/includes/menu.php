
<div class="user-show">
          <div class="container">
            <div class="head">
              <a href="#addnew" data-toggle="modal" ><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="content-box">
              <table id="example1">
                <thead>
                  <tr><th>Photo</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Date Added</th>
                  <th>Tools</th>
                </tr></thead>
                <tbody> <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM users");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        echo "
                          <tr>
                            <td class=\"flex\" style=\"justify-content: space-between;\">
                              <img src='".$image."' height='30px' width='30px'>
                              <span style=\"font-style: oblique;font-size: .9em;\" onClick=\"edphotus('".$row['firstname'].' '.$row['lastname']."','".$row['id']."')\" class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' ><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$row['email']."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>
                            "?>
                            <?php $fullname = $row['firstname'].' '.$row['lastname']; ?>
                            <?php  
                            echo"
                            </td>
                               <td></td>
                            <td>
                              <a href='carts.php?user=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> Cart</a><button onClick=\"edit('".$row['email']."','".$row['password']."','".$row['firstname']."','".$row['lastname']."','".$row['address']."','".$row['contact_info']."','".$row['id']."')\" ><i class='fa fa-edit'></i> Edit</button>
                              <button   onClick=\"del('".$fullname."','".$row['id']."')\"><i class='fa fa-trash'></i> 
                              Delete</button>
                            </td
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                                        </tbody>
              </table>
            </div>
          </div>
        </div>
