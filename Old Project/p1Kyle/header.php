<?php
if (!isset($_SESSION)) {session_start();}
?>
<!DOCTYPE html>


<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->

<html lang="en-US">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Author" content="Kyle Odin & Dan McClure">
<meta name="Description" content="CT310 Project #1, Cabbages, Eggplants, and Leeks">
<meta name="Keywords" content="CT310 Project #1, Cabbages, Eggplants, and Leeks">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<title>CT310 Project #1</title>
</head>



<!-- Start of page Body  -->


<body>

<div class="jumbotron">
    <h1>Project #1 <img src="Logo.png" class="img-circle" alt="Logo" width="150" height="150"></h1>
</div>

<?php include 'nav.php';?>

<div class="content">
