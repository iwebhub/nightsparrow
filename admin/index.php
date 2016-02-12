<?php
include '../config.php';
include '../inc/nightsparrow-main.php';
$ns = new Nightsparrow;
/** is this a valid session? **/
$status = $ns->validateUserSession($_COOKIE['ns_sid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());

if ($status !== true) {
  die(header('Location: ' . domainpath . 'login.php'));
}



/** now, let's check the privilege level! **/
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionHomepage');
$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($actualPrivilege < $neededPrivilege) {
  $ns->throwError(0x403403);
}
$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);
$csrfToken = $ns->getSessionCSRF($_COOKIE['ns_sid']);

$msg = null;

include '../template/admin/index.php';

if (isset($_GET) && isset($_GET['setAsHomepage'])) {
  if ($csrfToken != $_GET['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionChangeSetting');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError(0x403403);
      die();
    }
    $ns->addSetting("core", "homepageSlug", $_GET['setAsHomepage']);
    $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Stranica uspješno postavljena kao početna</span></div>';

  }
}
if (isset($_POST) && isset($_POST['update'])) {
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionUpdatePage');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError(0x403403);
      die();
    }
    $ns->updatePage($_POST['type'], $_POST['slug'], $_POST['status'], $_POST['title'], $_POST['body'], $userID, $_POST['summary'], $_POST['sources'], null, null, null, null, $_POST['parent'], $_POST['showinnav'], $_POST['originalSlug']);
  }
} elseif (isset($_POST) && isset($_POST['update-place'])) {
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionUpdatePage');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError(0x403403);
      die();
    }
    $ns->updatePlace($_POST['update-place'], $_POST['project'], $_POST['name'], $_POST['address'], $_POST['description']);
  }
} elseif (isset($_POST) && isset($_POST['action'])) {
  if ($_POST['action'] == 'addPage') {
    if ($csrfToken != $_POST['csrfToken']) {
      die(header('Location: ../login.php'));
    } else {
      $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionAddPage');
      $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
      if ($actualPrivilege < $neededPrivilege) {
        $ns->throwError(0x403403);
        die();
      }
      $ns->addPage($_POST['type'], $_POST['slug'], $_POST['status'], $_POST['title'], $_POST['body'], $userID, $_POST['summary'], $_POST['sources'], null, null, null, null, $_POST['parent'], $_POST['showinnav']);
    }

  }

  if ($_POST['action'] == 'addUser') {
    if ($csrfToken != $_POST['csrfToken']) {
      die(header('Location: ../login.php'));
    } else {
      $neededPrivilege = $ns->getSettingValue('core', 'adminPanelManageNonselfUser');
      $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
      if ($actualPrivilege < $neededPrivilege) {
        $ns->throwError(0x403403);
        die();
      }
      $ns->addUserAPI($_POST['name'], $_POST['email'], $_POST['password'], $_POST['level']);
    }

  }

  if ($_POST['action'] == 'addPlace') {
    if ($csrfToken != $_POST['csrfToken']) {
      die(header('Location: ../login.php'));
    } else {
      $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionAddPage');
      $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
      if ($actualPrivilege < $neededPrivilege) {
        $ns->throwError(0x403403);
        die();
      }
      $ns->addPlace($_POST['project'], $_POST['name'], $_POST['address'], $_POST['imageUrl'], $_POST['description']);
    }
  }


} elseif (isset($_POST) && isset($_POST['delete'])) {
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelDeletePage');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError(0x403403);
      die();
    }
    $ns->deletePageWithSlug($_POST['delete']);
    $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Stranica izbrisana.</span></div>';

  }


}

if ($_POST['action'] == 'settingsManager') {
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionSettingsManager');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError('forbidden');
      die();
    }

    $ns->addSetting('core', 'siteName', $_POST['siteName']);
    $ns->addSetting('core', 'siteType',$_POST['siteType']);
    $ns->addSetting('core', 'siteDescription', $_POST['siteDescription']);
    $ns->addSetting('pluginManager', 'pluginManager:Enabled', $_POST['pluginManagerStatus']);
    $ns->addSetting('generators', 'postsPerPage', $_POST['postsPerPage']);
    $ns->addSetting('core', 'publicRegistrationEnabled',$_POST['registrationStatus']);
    $ns->addSetting('core', 'disablePublicAPI',$_POST['disablePublicAPI']);
    $ns->addSetting('design', 'headerContent',$_POST['headerContent']);
    $ns->addSetting('design', 'footerContent',$_POST['footerContent']);
    $ns->addSetting('design', 'logoLink',$_POST['logoLink']);


    $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Postavke uređene</span></div>';


  }
}

if($_POST['action'] == 'editUser'){
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  }
  elseif(($_POST['self'] == true) && ($_POST['id'] == $userID)){
    $ns->updateUser($_POST['id'], $_POST['email'], $_POST['password'], $_POST['name'], null, $_POST['banned']);
    if(isset($_POST['password'])){
      $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Lozinka je promijenjena. <a href="login.php">Prijavite se ponovno</a></span></div>';
      echo $msg;
      die();
    }
  }
  elseif(($_POST['self'] == false) && ($actualPrivilege >= $ns->getSettingValue('core', 'adminPanelManageNonselfUser'))) {
    $ns->updateUser($_POST['id'], $_POST['email'], $_POST['password'], $_POST['name'], $_POST['level'], $_POST['banned']);
  }


}

elseif (isset($_POST) && isset($_POST['deleteUser'])) {
  if ($csrfToken != $_POST['csrfToken']) {
    die(header('Location: ../login.php'));
  } else {
    $neededPrivilege = $ns->getSettingValue('core', 'adminPanelManageNonselfUser');
    $actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
    if ($actualPrivilege < $neededPrivilege) {
      $ns->throwError(0x403403);
      die();
    }
    $ns->deleteUser($_POST['deleteUser']);
    $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Korisnik izbrisan.</span></div>';

  }


}


echo $msg;


echo '<div class="container"><div class="siteStructureMap">';
if (isset($_GET['showSubstructureMap'])) {
  echo '<h5>Prikazuje se dio strukturnog stabla.</h5><a href="index.php">(prikaži sve)</a>';
}
echo ' <ul class="collection shadow-z-3">';
if (isset($_GET['showSubstructureMap'])) {
  $ns->adminGetSiteStructureMap(htmlentities($_GET['showSubstructureMap']), 'index');
} else {
  $ns->adminGetSiteStructureMap();
}
echo '</div></div>';

include '../template/admin/footer.php';