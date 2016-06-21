<?php

class KruzimoHelper extends Nightsparrow
{

    function __construct()
    {
        parent::__construct();
    }

    function getCodeAddressReferences($project)
    {
        $dbconn = $this->mysqliConnect();
        $project = $dbconn->real_escape_string($project);
        $sql = "SELECT * FROM nb_places WHERE project = '$project' ORDER BY id DESC";
        $res = $dbconn->query($sql);
        if ($res === false) {
            echo $dbconn->error;
            $this->throwError(0x010010);
        }
        if ($res->num_rows == 0) {
            $this->throwError(0x404404);
        }
        while ($place = $res->fetch_assoc()) {
            $content = '<h1 class="huge-black-blue">' . $place['name'] . '</h1><div class="placeData"><i>' . $place['address'] . '</i><br>' . $place['description'] . '</div>';
            $content = addslashes($content);
            $address = $place['address'];
            $content = str_replace("č", "c", $content);
            $content = str_replace("ć", "c", $content);
            $content = str_replace("đ", "dj", $content);
            $content = str_replace("š", "s", $content);
            $content = str_replace("ž", "z", $content);
            $content = str_replace("   ", "", $content); // neki wtf bug u redactoru koji tripa gmaps, ovo je fix jadni
            $content = preg_replace('/[\x00-\x1F\x7F-\x9F]/u', '',
              $content); // redactor ubacuje 0A kontrolni znak za novi red iz nekog razloga, iako novi red nije potreban te taj novi red zbuni jadni javascript od gmapsa. uglavnom dva komada softvera u javascriptu se kolju. i onda mi netko predloži node.js kao programski jezik, fuj.

            $address = str_replace("č", "c", $address);
            $address = str_replace("ć", "c", $address);
            $address = str_replace("đ", "dj", $address);
            $address = str_replace("š", "s", $address);
            $address = str_replace("ž", "z", $address);
            $address = str_replace("   ", "", $address); // neki wtf bug u redactoru koji tripa gmaps, ovo je fix jadni
            $address = preg_replace('/[\x00-\x1F\x7F-\x9F]/u', '',
              $address); // redactor ubacuje 0A kontrolni znak za novi red iz nekog razloga, iako novi red nije potreban te taj novi red zbuni jadni javascript od gmapsa. uglavnom dva komada softvera u javascriptu se kolju. i onda mi netko predloži node.js kao programski jezik, fuj.
            $content .= '</p>';
            echo "codeAddress(\"" . $address . "\", \"" . $content . "\");";
        }

    }

    function getPlaceListSidebar($project)
    {
        $dbconn = $this->mysqliConnect();
        $project = $dbconn->real_escape_string($project);
        $sql = "SELECT * FROM nb_places WHERE project = '$project' ORDER BY name ASC";
        $res = $dbconn->query($sql);
        if ($res === false) {
            echo $dbconn->error;
            $this->throwError(0x010010);
        }
        if ($res->num_rows == 0) {
            $this->throwError(0x404404);
        }
        echo '<ul style="list-style-type: none;">';
        while ($place = $res->fetch_assoc()) {
            echo '<li style="padding-bottom: 10px; border-bottom: 2px solid #2D3D9F" class="blue">' . $place['name'] . '</li>';
        }
        echo '</ul>';
    }


}
