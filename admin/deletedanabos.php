<?php
require_once "./../connections/connections.php";

error_reporting(0);
session_start();

mysqli_query($conn,"DELETE FROM tb_danabos WHERE id_danabos = '".$_GET['menu_del']."'");
header("location:admin.php?p=danabos");  
?>
