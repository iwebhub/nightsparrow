<?php
if (file_exists('install.lock')) {
    die('Nightsparrow je već instaliran. Ako niste instalirali Nightsparrow, konzultirajte se s dokumentacijom.');
}
require_once '../inc/install.php';
$install = new Installer();
/** Nightsparrow instalacija
 * POSTAVLJANJE POSTAVKI DATABAZE **/
if (isset($_POST['setdb'])) {
    if ($_POST['setdb'] == 'true') {
        $dbserv = $_POST['server'];
        $dbuser = $_POST['user'];
        $dbpassword = $_POST['password'];
        $dbname = $_POST['db'];
        $dbconn = new mysqli($dbserv, $dbuser, $dbpassword, $dbname);

        // provjerimo konekciju
        if ($dbconn->connect_error) {
            include '../template/install/fail_header.php';
            include '../template/install/mysqli_fail.php';
            include '../template/install/footer.php';
            die();
        } else {
            $sqldump = file_get_contents('../inc/fls/dump.sql');
            if (!$sqldump) {
                include '../template/install/fail_header.php';
                echo '<h1>Uh...</h1>';
                echo '<p>SQL dump nije pronađen -- Nightsparrow ne može biti instaliran. <a href="mailto:say.hello@pulsir.eu">Prijavite ovaj problem</a>.</p>';
                include '../template/install/footer.php';
                die();
            }

            include '../template/install/header.php';
            $configfile = file_get_contents('../config.php'); // učitajmo predložak za instalaciju
            $configfile = str_replace('@@nightsparrow-mysql-user@@', $dbuser, $configfile); // zamjena placeholdera
            $configfile = str_replace('@@nightsparrow-mysql-db@@', $dbname, $configfile); // zamjena placeholdera
            $configfile = str_replace('@@nightsparrow-mysql-pw@@', $dbpassword, $configfile); // zamjena placeholdera
            $configfile = str_replace('@@nightsparrow-mysql-srv@@', $dbserv, $configfile); // zamjena placeholdera
            $fpcres = file_put_contents('../config.php', $configfile);


            echo '<center><p class="loading">Nightsparrow priprema databazu za korištenje...</p></center>';
            echo '<img src="../template/install/loading.gif" width=60" alt="Samo trenutak." class="loading">';
            mysqli_multi_query($dbconn, $sqldump);
            echo '<h1>Baza pripremljena!</h1><style>.loading{display:none;}</style>';

            if ($fpcres == false) {
                $install->chmod_error($configfile, 'config.php', 'step2.php'); // spremi vrijednost ili prikaži grešku
                die();
            }
            echo '<br><a class="btn btn-primary btn-large" href="step3.php">Nastavi &rarr;</a>';
        }

    }
} else {
    include '../template/install/header.php';
    include '../template/install/step2.php';
    include '../template/install/footer.php';
}