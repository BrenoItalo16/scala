<?php
session_start();


$_SESSION["tema"] = $_GET["css"];

$sql = "update usuarios set tema = '{$_GET["css"]}' where id = 1";
#salvar o tema no banco