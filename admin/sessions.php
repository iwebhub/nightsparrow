<?php

include '../config.php';
include '../inc/nightsparrow-main.php';
include '../inc/generator.php';

$ns = new Nightsparrow;
$ns->gen = new PageGenerator;

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

$pageTitle = 'Session management';
include '../template/admin/header.php';
include '../template/admin/navigation.php';

if(isset($_GET['deleteSession'])){
    if ($csrfToken != $_GET['csrfToken']) {
        die(header('Location: ../login.php'));
    }
    else{
        $ns->deleteSession($_GET['deleteSession']);
        $msg .= '<div class="card-panel"><span class="blue-text text-darken-2"><i class="mdi-image-tag-faces"></i> Prijava obrisana.</span></div>';

    }
}

echo $msg;

echo '<div class="cont">';
$ns->gen->generateSessionsTable($ns->getAllSessions($userID));

echo '</div>';