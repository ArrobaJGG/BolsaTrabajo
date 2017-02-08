<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo; ?></title>
	<?php foreach ($css as $cs): ?>
		<link rel="stylesheet" href="<?php echo $cs ?>">
	<?php endforeach; ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="">

</head>
<body ng-app="my-app">
	
	<header id="header" class="">
		<div id="logo"></div>
		<div id="eslogan"></div>
		<div id="idiomas"><a href="#">ES</a>|<a href="#">EU</a></div>
	</header>

