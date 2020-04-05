<!-- User Account Menu -->
<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <img onerror="this.onerror=null; this.src='../public/images/user.png'" src="<?php echo $publicUser.$session["USER_PHOTO"] ?>"  class="user-image" alt="User Image">
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs"><?php echo $session["USER_NAME"]; ?></span>
  </a>
  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <img onerror="this.onerror=null; this.src='../public/images/user.png'" src="<?php echo $publicUser.$session["USER_PHOTO"] ?>"  class="img-circle" alt="User Image">
      <p>
        <?php echo $session["USER_NAME"]; ?>
        <small>Member since Nov. 2012</small>
      </p>
    </li>
    </li>
    <!-- Menu Footer-->
  <li class="user-footer">
      <div class="pull-left">
        <a data-toggle="modal" data-target="#detail" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="../view/content/auth.php?id=logout" class="btn btn-default btn-flat">Sign out</a>
      </div>
    </li>
  </ul>
</li>
