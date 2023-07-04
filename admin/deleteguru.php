<?php
require_once "./../connections/connections.php";

error_reporting(0);
session_start();

mysqli_query($conn,"DELETE FROM tb_guru WHERE id_guru = '".$_GET['menu_del']."'");
header("location:admin.php?p=guru");  
?>
