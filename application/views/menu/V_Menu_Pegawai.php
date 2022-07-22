      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper" style="margin-bottom: 0px;">
                <div class="profile-image">
                  <img src="<?= $user_avatar; ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $user_name; ?></p>
                  <div>
                    <!-- <small class="designation text-muted"><?= $user_unit; ?></small><br> -->
                    <!-- <small class="designation text-muted">Bid. <?= $data_pegawai->unit_kerja; ?></small> -->
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(''); ?>">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('StrukturOrganisasi/index'); ?>">
              <i class="menu-icon mdi mdi-group"></i>
              <span class="menu-title">Struktur Organisasi</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Ebook/indexpegawai'); ?>">
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title">Surat Edaran</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Tarif/index'); ?>">
              <i class="menu-icon mdi mdi-calculator"></i>
              <span class="menu-title">Tarif</span>
            </a>
          </li>
          <!-- 
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Report/index'); ?>">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-report">Report</span>
            </a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Inbox/indexpegawai'); ?>">
              <i class="menu-icon mdi mdi-phone"></i>
              <span class="menu-title">Saran</span>
            </a>

          </li>
        </ul>
      </nav>
      <div class="main-panel">