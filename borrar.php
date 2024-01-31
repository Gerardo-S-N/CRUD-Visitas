<?php
include("conexion.php");

$id = $_GET["id"];

$base->query("DELETE FROM Visitas_2023 WHERE ID ='$id'");
header("Location:index.php");
?>
