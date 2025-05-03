
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="<?php echo base_url('admin_area');?>" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="<?php echo base_url();?>dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="<?php echo base_url('admin_area');?>" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="bi bi-file-earmark-post-fill"></i>
                  <p>
                    Posts
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/news');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Post</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/news/newslists');?>" class="nav-link">
                      <i class="fa fa-thumb-tack"></i>
                      <p>All Posts</p>
                    </a>
                  </li>                  
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="bi bi-tags-fill"></i>
                  <p>
                    Category
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/category');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('admin/category/list');?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Category</p>
                    </a>
                  </li>                 
                </ul>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('admin/ads');?>" class="nav-link">
                  <i class="fa fa-newspaper"></i>
                  <p> Ads </p>
                </a>                
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/notice');?>" class="nav-link">
                  <i class="fa fa-bell"></i>
                  <p> Notifications </p>
                </a>                
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/author');?>" class="nav-link">
                  <i class="bi bi-person-fill-gear"></i>
                  <p> Authors </p>
                </a>                
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('admin/options');?>" class="nav-link">
                  <i class="fa fa-cog"></i>
                  <p> Option </p>
                </a>                
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('logout');?>" class="nav-link">
                  <i class="fa fa-sign-out "></i>
                  <p> Logout</p>
                </a>                
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      