<?php

$environment = array_merge($_SERVER, $_ENV);
ksort($environment);
if(!isset($environment['MYSQL_PORT'])){
    $environment['MYSQL_PORT'] = 3306;
}

try {
    $dbh = new PDO("mysql:host={$environment['MYSQL_HOST']};port={$environment['MYSQL_PORT']}", $environment['MYSQL_USER'], $environment['MYSQL_PASSWORD']);
    http_response_code(200);
    echo "MySQL Healthy";
} catch (PDOException $e) {
    http_response_code(500);
    echo "MySQL Unhealthy";
}
