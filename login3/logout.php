<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

session_unset();

session_destroy();
   echo 'You have succesfully logged out';
   header('Refresh: 2; URL = index.php');
?>
