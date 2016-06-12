<?php

/** Nightsparrow, sustav za upravljanje sadržajem **/

include_once 'inc/nightsparrow-main.php';
include_once 'inc/database-display.php';
include_once 'inc/generator.php';
include_once 'inc/router.php';
include_once 'inc/APIHandler.php';

$ns = new Nightsparrow;
$ns->gen = new PageGenerator;
$router = new Nightrouter;
$api = new APIHandler;


if (file_exists('config.php')) {
  include_once 'config.php';
}
if (!file_exists('config.php') && !file_exists('install/install.lock')) {
  header('Location: install/index.php');
}
if (!file_exists('config.php') && file_exists('install/install.lock')) {
  die($ns->throwError('0xCFAA'));
}


$activeTheme = $ns->getSettingValue('core', 'siteActiveTheme');


$request = $_SERVER['REQUEST_URI'];
if (($_SERVER['HTTPS'] == null) || ($_SERVER['HTTPS'] == 'off')) {
  $protocol = 'http';
} else {
  $protocol = 'https';
}
$url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $request;

$pathName = str_replace(domainpath, "", $url);
$routeSegments = explode("/", $pathName);

if ($routeSegments[0] == "") {
  $ns->gen->PageViewGenerator('homepage', $activeTheme);
} elseif ($routeSegments[0] == "page") {
  $ns->gen->PageViewGenerator($routeSegments[1], $activeTheme);
} elseif ($routeSegments[0] == "login") {
  include 'login.php';
  die();
} elseif ($routeSegments[0] == "authenticate") {
  echo 'Protected page';
  die();
}
elseif ($routeSegments[0] == 'api') {
  $array = array($routeSegments[1], $routeSegments[2], $routeSegments[3], $routeSegments[4]);
  $api->APIEntryPoint($array);
}
else
 {
  $ns->gen->PageViewGenerator(end($routeSegments), $activeTheme);
}

if($ns->getSettingValue("pluginManager", "pluginManager:Enabled") == 1){
  if ($ns->getSettingValue("pluginManager", "analytics:Enabled") == 1) {
    require_once 'inc/analyze.php';
    $analyze = new Analyze();
    $data = $analyze->grabEverything();
    $analyze->addVisit($data);
  }
}
