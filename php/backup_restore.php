<?php

define("PATH_BACKUP","../uploads/");

$server_name="localhost";
$username="root";
$password="hades";
$database_name="blog";
$date_string=date("Ymd");

$cmd="C:\wamp\bin\mysql\mysql5.6.17\bin\mysqldump --routines -h {$server_name} -u {$username} -p {$password} {$database_name} > ".PATH_BACKUP."{$date_string}_{$database_name}.sql";
exec($cmd);


?>
