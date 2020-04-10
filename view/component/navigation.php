<div class="site-navbar-wrap js-site-navbar bg-white">
  <div class="container">
    <div class="site-navbar bg-light">
      <div class="row align-items-center">
        <div class="col-4" style="padding:10px">
            <a href="index.php" class="font-weight-bold text-uppercase">
              <h2 class="mb-0 site-logo" id="logoText">
              SDN PAKIS V SURABAYA
              </h2>
              <img src="public/images/logo.png" alt="" width="50px" id="logoImg">
            </a>
        </div>
        <div class="col-8">
          <nav class="site-navigation text-right" role="navigation">
            <div class="container">
              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?id=membaca">Membaca</a></li>
                <li><a href="index.php?id=berita">Berita</a></li>
                <li><a href="index.php?id=ebook">E-Book</a></li>
                  <?php
                  if (!empty($session["USER_NAME"])) { ?>
                    <li class="has-children">
                    <img src="admin/resource/public/USER/<?php echo $session["USER_PHOTO"]; ?>" style="width:50px;border-radius:50px">
                    <ul class="dropdown arrow-top" style="width: 105px;">
                      <li><a href="admin/index.php?id=home" style="padding-left: 15px;">Dashboard</a></li>
                      <li><a href="view/content/auth.php?id=logout" style="padding-left: 15px;">Logout</a></li>
                    </ul>
                    </li>
                  <?php } else { ?>
                    <li>
                    <a href="view/content/login.php"><span class="d-inline-block bg-primary text-white btn btn-primary">Login</span></a></li>
                  <?php } ?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  if (screen.width < 1011) {
    document.getElementById("logoText").style.display = "none";
    document.getElementById("logoImg").style.display = "block";
  } else {
    document.getElementById("logoText").style.display = "block";
    document.getElementById("logoImg").style.display = "none";
  }
</script>
