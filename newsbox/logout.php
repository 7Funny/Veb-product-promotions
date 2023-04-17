<?php include("header.php");?>
<?php
unset($_SESSION['user']);
header('Location: index.php');
?>