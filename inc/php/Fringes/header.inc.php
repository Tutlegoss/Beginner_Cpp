<?php

	require_once("pdoconfig.php");

	/* Comment out when done */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Hardcoded $article, so no prepared statement */
	$headerData = $conn->query("SELECT Headers.*, Articles.ArticleID FROM Headers LEFT JOIN Articles
	                            ON Headers.Title = Articles.Title WHERE Headers.Title = '$article';");
	$headerData->execute();
	$headerData = $headerData->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en-US">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Landen Marchand">
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">
	<meta name="keywords" content="<?php echo $headerData["Keywords"]; ?>">

	<title><?php echo $headerData["Title"]; ?></title>

	<link rel="icon" href="<?php echo $headerData["Path"]; ?>img/SiteImgs/K_Ico.ico">

	<!-- Directory relative to article page and not header.inc.php -->
	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/fontAwesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/css/normalize.min.css">
	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/css/main.css">
