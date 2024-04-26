<?php
$databaseName = 'MYOO_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'myoo_writer';
$password = '(dBvkuk90vtVZ[lIH&}C';

$pdo = new PDO($dsn, $username, $password);
if ($pdo) print '<!-- Connection complete -->';
?>