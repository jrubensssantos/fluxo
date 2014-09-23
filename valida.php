<?php session_start(); 
if (strlen($_SESSION['idUsuario']) <= 0) 
{
	session_destroy();
	header("Location: index.php");
	exit();	
}
function codificaSenha($senha)
{
	return md5($senha);
}
require_once 'conexao.php';