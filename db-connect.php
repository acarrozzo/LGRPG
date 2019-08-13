<?php
    $usermain = 'root';
    $password = 'root';
    $lgdb = 'lg_db';
    $host = '127.0.0.1';
    //$host = 'localhost';
    $port = 8889;
    $link = $GLOBALS['link'] = mysqli_init();
    $conn = mysqli_real_connect(
        $link,
        $host,
        $usermain,
        $password,
        $lgdb,
        $port
        );
