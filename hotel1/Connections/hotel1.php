<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_hotel1 = "localhost";
$database_hotel1 = "hotel1";
$username_hotel1 = "root";
$password_hotel1 = "";
$hotel1 = mysql_pconnect($hostname_hotel1, $username_hotel1, $password_hotel1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>