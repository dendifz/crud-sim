  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">SIM PNJ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url; ?>/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/pendidikan" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Pendidikan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/prodi" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Program Studi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/dosen" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/kelas" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/jadwal" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-header">Kuliah</li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/jamkuliah" class="nav-link">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                Jam Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/matakuliah" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mata Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/ruangan" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Ruangan Kuliah
              </p>
            </a>
          </li>
          
          
          <li class="nav-header">Extra</li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/about" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                About Me
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>