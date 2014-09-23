<?php session_start();
$arrDados = $_POST;
require_once("conexao.php");
$arrDados['DsEmail'] = mysql_real_escape_string($arrDados["DsEmail"]);
$arrDados['DsSenha'] = md5(mysql_real_escape_string($arrDados["DsSenha"]));
$StrSQL = "SELECT idUsuario, NmUsuario FROM tsUsuario WHERE DsEmail = '{$arrDados['DsEmail']}' and DsSenha = '{$arrDados['DsSenha']}'";

$objrs = mysql_query($StrSQL);
$objRow = mysql_fetch_array($objrs);

if(strlen($objRow["idUsuario"] > 0)){
	$_SESSION["idUsuario"] = $objRow["idUsuario"];
	$_SESSION["DsEmail"] = $objRow["DsEmail"];
	$_SESSION["NmUsuario"] = $objRow["NmUsuario"];
	mysql_close();
	header("location:listMovimento.php");
	exit();
} else {
	//header("location:index.php");
	echo "Login e senha inválidos, <a href='index.php'>tente novamente!</a>";
}