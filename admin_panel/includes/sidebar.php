<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
    <i class="fas fa-user-shield"></i>
      <!-- <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
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
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                <li class="nav-item">
                    <a href="./" class="nav-link <?php echo !isset($_GET['page']) && empty($_GET['page']) ? 'active' : '' ?>">
                        <i class="fas fa-home"></i>
                        <p>หน้าแรก</p>
                    </a>
                </li>
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                <li class="nav-item">
                    <a href="?page=product" class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'product' ? 'active' : '' ?>">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Product</p>
                    </a>
                </li>
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                <li class="nav-item">
                    <a href="?page=category" class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'category' ? 'active' : '' ?>">
                        <i class="fas fa-tags"></i>
                        <p>Category</p>
                    </a>
                </li>
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                <li class="nav-item">
                    <a href="?page=user" class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'user' ? 'active' : '' ?>">
                        <i class="fas fa-user-cog"></i>
                        <p>จัดการข้อมูลผู้ใช้</p>
                    </a>
                </li>
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                <li class="nav-item">
                    <a href="?page=order" class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'order' ? 'active' : '' ?>">
                        <i class="fas fa-paste"></i>
                        <p>Order </p>
                    </a>
                </li>
                <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>