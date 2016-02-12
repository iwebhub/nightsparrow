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

include '../template/admin/index.php';
echo '<div class="container"><div class="pageEditor">';
$fields = $ns->getPageAPI($_GET['slug']);
//var_dump($fields);
echo "<form action=\"index.php\" method=\"post\">
  <input type=\"hidden\" name=\"action\" value=\"editPage\" class=\"form-control\">
  <div class=\"form-group form-control-wrapper\">
<input type=\"text\" name=\"slug\" value=\"{$fields['slug']}\" class=\"form-control empty\" placeholder=\"Kratka oznaka (slug)\">
  <div class=\"floating-label\">Kratka oznaka (slug)</div>
<span class=\"material-input\"></span>
  </div>
  <div class=\"form-group form-control-wrapper\">
  <input type=\"text\" name=\"title\" value=\"{$fields['title']}\" class=\"form-control empty\">
  <div class=\"floating-label\">Naslov</div>
<span class=\"material-input\"></span>
  </div>
  <div class=\"form-group form-control-wrapper\">
  <input type=\"text\" name=\"summary\" value=\"{$fields['summary']}\" class=\"form-control empty\">
  <div class=\"floating-label\">Sažetak</div>
<span class=\"material-input\"></span>
  </div>
  <div class=\"form-group form-control-wrapper\">
  <input type=\"text\" name=\"sources\" value=\"{$fields['sources']}\" class=\"form-control empty\">
  <div class=\"floating-label\">Izvori</div>
<span class=\"material-input\"></span>
  </div>
  <div class=\"form-group form-control-wrapper\">
  <textarea name=\"body\" class=\"form-control empty\" rows=\"35\">{$fields['body']}</textarea>
  <div class=\"floating-label\">Tijelo (sadržaj)</div>
<span class=\"material-input\"></span>
  </div>
  <div class=\"form-group\"><button type=\"submit\" class=\"btn btn-primary\" >Uredi stranicu</button>
  </div>
  </form>";


echo '</div></div>';

include '../template/admin/footer.php';