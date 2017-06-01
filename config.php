<?php

function getConfig() {
    return parse_ini_file(".config.ini", true);
}

function getConfigSection($section) {
    $config = parse_ini_file(".config.ini", true);
    return $config[$section];
}

?>
