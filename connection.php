<?php
   $conn_array = array (
    "UID" => "phuc",
    "PWD" => "@hutech123",
    "Database" => "cnpm",
);
$cookie_name = 'siteAuth';
$cookie_time = (3600 * 24 * 1); // 30 days

$conn = sqlsrv_connect('cnpmhutech.database.windows.net', $conn_array);
?>