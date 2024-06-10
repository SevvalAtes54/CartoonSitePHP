<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
            <div class="info">
                <h5><a href="#" class="d-block"><?php echo $_SESSION['fullName'];?></a></h5>
            </div>
        </div>

        <?php } else { ?>

            <div class="info">
                <h5><a href="#" class="d-block">Guest User</a></h5>
            </div>
        </div>
    <?php }?>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Cartoons
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="cartoon_info.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cartoon Information</p>
                            </a>
                        </li>

                        <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION["yetki"] == "1") { ?>
                            <li class="nav-item">
                                <a href="edit_cartoon_form.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Cartoon Information</p>
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </li>
                <hr>
            <?php }?>

            <?php if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) { ?>
                <li class="nav-item">
                    <a href="login_page.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Login</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="register_page.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Register</p>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            <?php } ?>

            <li class="nav-item">
                <a href="send_message.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Contact</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
