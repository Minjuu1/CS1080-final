<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>College Curios</title>
    <meta name="author" content="Apoorva Joshi and Minju Yoo">
    <meta name="description" content="Website where college students can buy the items that someone donates and profit will donate to support charities.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" href="css/layout-desktop.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" href="css/layout-tablet.css?version=<?php print time(); ?>" media="(max-width: 820px)" type="text/css">
    <link rel="stylesheet" href="css/layout-phone.css?version=<?php print time(); ?>" media="(max-width: 430px)" type="text/css">
</head>

<?php

print '<body class="' . $pathParts['filename'] . '">';
print '<!-- #################   Body element    ################# -->';
include 'database-connect.php';
include 'header.php';
include 'nav.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>