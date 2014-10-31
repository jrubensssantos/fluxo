<?php session_start();
require_once 'head.php';
$arrDados = $_POST;
require_once("conexao.php");
$arrDados['DsEmail'] = mysql_real_escape_string($arrDados["DsEmail"]);
$arrDados['DsSenha'] = md5(mysql_real_escape_string($arrDados["DsSenha"]));
$StrSQL = "SELECT idUsuario, NmUsuario FROM tsUsuario WHERE DsEmail = '{$arrDados['DsEmail']}' and DsSenha = '{$arrDados['DsSenha']}'";

$objRs = mysql_query($StrSQL);
$objRow = mysql_fetch_array($objRs);

if(strlen($objRow["idUsuario"] > 0)){
	$_SESSION["idUsuario"] = $objRow["idUsuario"];
	$_SESSION["DsEmail"] = $objRow["DsEmail"];
	$_SESSION["NmUsuario"] = $objRow["NmUsuario"];
	mysql_close();
	header("location:listMovimento.php");
	exit();
} 
else 
{	
	echo "<div>
			<div class='col-lg-4'>
				<div class='alert alert-warning'>        				
					Login e senha inválidos, <a href='index.php'>tente novamente!</a>
        		</div>
        	</div>	    				
		</div>";//fim mensagem para o usuário   				
}