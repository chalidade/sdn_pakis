<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $urlAssets.'user2-160x160.jpg'?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Chalid Ade Rahman</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="index.php?id=home"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Program Tahunan</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_prota">Input Prota</a></li>
          <li><a href="index.php?id=data_prota">Data Prota</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Program Semester</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_promes">Input Promes</a></li>
          <li><a href="index.php?id=data_promes">Data Promes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-paperclip"></i> <span>Silabus</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_silabus">Input Silabus</a></li>
          <li><a href="index.php?id=data_silabus">Data Silabus</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-paperclip"></i> <span>RPP</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_rpp">Input RPP</a></li>
          <li><a href="index.php?id=data_rpp&start=0">Data RPP</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-folder"></i> <span>Analisis KD</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_analisis">Input Analisis KD</a></li>
          <li><a href="index.php?id=data_analisis">Data Analisis KD</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-folder"></i> <span>Analisis Hasil Belajar</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_analisis_hb">Input Analisis HB</a></li>
          <li><a href="index.php?id=data_analisis_hb&start=0">Data Analisis HB</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-folder-open"></i> <span>Buku Induk</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_buku_induk">Input Buku Induk</a></li>
          <li><a href="index.php?id=data_buku_induk">Data Buku Induk</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar"></i> <span>Absen Siswa</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_absen_siswa">Input Absen Siswa</a></li>
          <li><a href="index.php?id=data_absen_siswa">Data Absen Siswa</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar"></i> <span>Absen Guru</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_absen_guru">Input Absen Guru</a></li>
          <li><a href="index.php?id=data_absen_guru">Data Absen Guru</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Keuangan</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_keuangan">Input Keuangan</a></li>
          <li><a href="index.php?id=data_keuangan">Data Keuangan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-wrench"></i> <span>Inventaris / Sarpas</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_inventaris">Input Inventaris</a></li>
          <li><a href="index.php?id=data_inventaris">Data Inventaris</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-folder-o"></i> <span>Dokumen Kurikulum</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_kurikulum">Input Dokumen Kurikulum</a></li>
          <li><a href="index.php?id=data_kurikulum">Data Dokumen Kurikulum</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-heart"></i> <span>Aku Suka Membaca</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=input_membaca&start=0&page=1">Tambah Data</a></li>
          <li><a href="index.php?id=data_rangking&start=0">Rangking Siswa Membaca</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-heart"></i> <span>Guru, Siswa, Staff</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=data_siswa&start=0&page=1">Data Siswa</a></li>
          <li><a href="index.php?id=data_guru&start=0">Data Guru</a></li>
          <li><a href="index.php?id=data_staff&start=0">Data Staff</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-gear"></i> <span>Homepage</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?id=homepage">Homepage</a></li>
          <li><a href="index.php?id=profil">Profil</a></li>
          <li><a href="index.php?id=berita&start=0">Berita</a></li>
        </ul>
      </li>
      <li><a href="index.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
