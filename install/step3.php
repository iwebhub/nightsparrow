<?php
if (file_exists('install.lock')) {
    die('Nightsparrow je već instaliran. Ako niste instalirali Nightsparrow, konzultirajte se s dokumentacijom.');
}
include '../config.php';
include '../inc/nightsparrow-main.php';
include '../inc/exampler.php';
$ns = new Nightsparrow;
$eg = new ExampleGenerator;
if (isset($_POST['s3']) && ($_POST['s3'] == 'true')) { // je li forma poslana?
    $ns->addUserAPI($_POST['name'], $_POST['email'], $_POST['password'], 10); // dodajmo korisnika
    header('Location: step4.php'); // preusmjerimo na korak 4
} else {
    include '../template/install/header.php';
    include '../template/install/step3.php';
    include '../template/install/footer.php';
}