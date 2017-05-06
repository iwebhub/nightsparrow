<div class="navigation-wrapper">
  <div class="logo-wrapper"></div>
  <div class="nav">
    <span><a href="user.php?id=<?php echo $ns->getSessionUser($_COOKIE['ns_sid']); ?>"><?php echo $loggedInUser; ?></a> <span class="nav-sep"></span> <a href="../login.php?action=logout"><img src="../template/admin/img/logout.png"></a></span>
  </div>
</div>
<div class="side-navigation-wrapper">
  <div class="nav">
    <ul>
      <a href="index.php"><li><img src="../template/admin/img/structure2.png"><p>Struktura</p></li></a>
      <a href="design.php"><li><img src="../template/admin/img/brush.png"><p>Dizajn</p></li></a>
      <a href="users.php"><li><img src="../template/admin/img/users.png"><p>Korisnici</p></li></a>
      <?php if (($ns->getSettingValue('pluginManager',
            'pluginManager:Enabled') == true) && ($ns->getSettingValue('pluginManager', 'analytics:Enabled'))
      ) {
        echo '<a href="analytics.php"><li><img src="../template/admin/img/line-chart.png"><p>Analitika</p></li></a>';
      }
      ?>
      <a href="settings-manager.php"><li><img src="../template/admin/img/settings.png"><p>Postavke</p></li></a>
    </ul>
  </div>
</div>
