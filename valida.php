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
function existeRegistro($campo = NULL, $valor = NULL)
{ 
	if ($campo != NULL && $valor != NULL)
	{
		is_numeric($valor) ? $valor = $valor : $valor = "'".$valor."'";
		$strSQL =   "
						SELECT 
								*
						FROM     
								tuMovimento
						WHERE    
								$campo = $valor 
					";
		mysql_query($strSQL);
		if (mysql_affected_rows(1))
		{
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}
echo $strSQL;
}
require_once 'conexao.php';