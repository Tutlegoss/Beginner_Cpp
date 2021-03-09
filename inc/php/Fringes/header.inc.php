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

<!DOCTYPE html>
<html lang="en-US">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Landen Marchand">
	<meta name="description" content="Personal Project of Landen Marchand">
	<meta name="keywords" content="Tutlegoss, C++, Cpp, Tutorial, Beginner, Programming">

	<link rel="icon" href="<?php echo $headerData["Path"]; ?>img/SiteImgs/K_Ico.png">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<!-- Directory relative to article page and not header.inc.php -->
	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/css/normalize.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $headerData["Path"]; ?>inc/css/main.css">
