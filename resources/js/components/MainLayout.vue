<template>
        <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        
      </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      
      <span class="brand-text font-weight-light">Cancer Registry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="./img/avatar.png" class="img-circle elevation-2" alt="User Image" style="background-color: white"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">
              user
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <router-link to="/" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Dashboard
                    </p>
                </router-link>
            </li>
            
          <li class="nav-item has-treeview ">
                
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <router-link to="liste-patients" class="nav-link ">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>créer un enregistrement</p>
                </router-link>
              </li>
              <li class="nav-item"> 
                <router-link to="patients" class="nav-link ">
                  <i class="fas fa-pen-square nav-icon"></i>
                  <p>Feuilleter/Éditer</p>
                </router-link>
              </li>
              <li class="nav-item"> 
                <router-link to="users" class="nav-link ">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Ajouter un utilisateur</p>
                </router-link>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                    </p>
                </router-link>
            </li>

            <li class="nav-item">

              
              <a class="nav-link" href="#"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <i class="nav-icon fas fa-power-off"></i>
                      <p>Deconnexion</p>

                      </a>

                    <!-- <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <i class="nav-icon fas fa-power-off"></i>
                      <p>{{ __('Logout') }}</p>

                      </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> -->
                </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       <router-view />
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 ABDELMOULA basma</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
</template>

<script>
import Content from './Content'
export default {
  name: 'MainLayout',
  components: {
    // Content
  }

}
</script>