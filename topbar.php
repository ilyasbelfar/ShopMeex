<div class="header flex">
    <div class="header-container">
        <ul class="nav-left">
                                    <li>
                                        <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                                            <i class="ti-menu"></i>
                                        </a>
                                    </li>
                                    <li class="search-box">
                                        <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                            <i class="search-icon ti-search pdd-right-10"></i> 
                                            <i class="search-icon-close ti-close pdd-right-10 hiding">

                                            </i>
                                        </a>
                                    </li>
                                    <li class="search-input hiding">
                                        <input class="form-control" type="text" placeholder="Search...">
                                    </li>
                                </ul>
        <ul class="nav-right" style="margin: 0 -40px">
                                    <li class="notifications dropdown" style="vertical-align: super;">
                                        <span class="counter bg-pink">3</span> 
                                        <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                                            <i class="ti-bell">

                                            </i>
                                        </a>
                                        <ul class="dropdown-menu">

                                        </ul>
                                    </li>
                                    <li class="notifications dropdown" style="vertical-align: super;">
                                        <span class="counter bg-pink">3</span> 
                                        <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                                            <i class="ti-email"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle  " data-toggle="dropdown">
                                            <div class="peer flex " style="position:relative;width: 30px;height: 30px;border-radius: 50%;">
                                                <img  style="width: 100%;border-radius: 50%;" src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
                                                <div  id="admin-image" style="position:absolute;width:100%;height:30px;border-radius:50%;left:0;background-color:#000 ; "></div>
                                            </div>
                                            <div class="users-det" style="font-size: .75em;vertical-align: top;" ><?php echo $admin['firstname'].'<br>'.' '.$admin['lastname']; ?></div>
                                          
                                       </a>
                                     <ul class="dropdown-menu hiding">
                                        <!-- User image -->
                                        <li class="user-header">
                                          <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

                                          <p>
                                            <?php echo $admin['firstname'].' '.$admin['lastname']; ?>
                                              <small>Member since </small>
                                          </p>
                                        </li>
                                        <li class="user-footer flex">
                                          <div class="pull-left">
                                            <a href="#profile" data-toggle="modal" id="admin_profile">Update</a>
                                          </div>
                                          <div class="pull-right">
                                            <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                          </div>
                                        </li>
          </ul>
                                </ul>
    </div>
</div>
    