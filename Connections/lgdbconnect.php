<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_lgdbconnect = "localhost";
$database_lgdbconnect = "cmtconst_lg";
$username_lgdbconnect = "cmtconst_admin";
$password_lgdbconnect = "1015alclg";
$lgdbconnect = mysql_pconnect($hostname_lgdbconnect, $username_lgdbconnect, $password_lgdbconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>