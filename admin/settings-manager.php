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
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionSettingsManager');
$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($actualPrivilege < $neededPrivilege) {
    $ns->throwError(0x403403);
}
$pageTitle = 'Postavke';


$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);

$csrfToken = $ns->getSessionCSRF($_COOKIE['ns_sid']);

$data['siteName'] = $ns->getSettingValue('core', 'siteName');
$data['siteType'] = $ns->getSettingValue('core', 'siteType');
$data['siteDescription'] = $ns->getSettingValue('core', 'siteDescription');
$data['pluginManagerStatus'] = $ns->getSettingValue('pluginManager', 'pluginManager:Enabled');
$data['analyzeStatus'] = $ns->getSettingValue('pluginManager', 'analytics:Enabled');
$data['postsPerPage'] = $ns->getSettingValue('generators', 'postsPerPage');
$data['registrationStatus'] = $ns->getSettingValue('core', 'publicRegistrationEnabled');
$data['pageCommentStatus'] = $ns->getSettingValue('core', 'pageComments:Enabled');
$data['headerContent'] = $ns->getSettingValue('design', 'headerContent');
$data['footerContent'] = $ns->getSettingValue('design', 'footerContent');
$data['logoLink'] = $ns->getSettingValue('design', 'logoLink');
$data['publicAPIStatus'] = $ns->getSettingValue('core', 'disablePublicAPI');


include '../template/admin/header.php';
include '../template/admin/navigation.php';

include '../template/admin/settings.php';

include '../template/admin/footer.php';