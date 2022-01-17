<?php
    $usermain = 'root';
    $password = 'root';
    $lgdb = 'lg_db';
    $host = '127.0.0.1';
    //$host = 'localhost';
    $port = 8889;



    if (!empty(getenv("MYSQL_HOST"))) {
        $usermain = getenv("MYSQL_USER");
        $password = getenv("MYSQL_PASS");
        $lgdb = 'lg_db';
        $host = getenv("MYSQL_HOST");
        //$host = 'localhost';
        $port = 3306;
    }



    $link = $GLOBALS['link'] = mysqli_init();
    $conn = mysqli_real_connect(
        $link,
        $host,
        $usermain,
        $password,
        $lgdb,
        $port
        );
        ?>
