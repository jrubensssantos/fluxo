<?php session_start();
session_destroy(); //pei!!! destruimos a sessão ;)
header("location: index.php");