<?php
	require_once("conexao.php");
	$arrDados = $_REQUEST; 
  
	$arrDados["idUsuario"] = mysql_real_escape_string($arrDados["idUsuario"]);
	$arrDados["NmUsuario"] = mysql_real_escape_string($arrDados["NmUsuario"]);
	$arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
	$arrDados["DsSenha"] = mysql_real_escape_string($arrDados["DsSenha"]);
	
	if((strlen($arrDados["idUsuario"]) > 0))
	{
		echo "Agora aqui";		
		$strSQL = "	UPDATE 
						fluxo.tsUsuario
					SET
						NmUsuario = '{$arrDados['NmUsuario']}'
						,DsEmail = '{$arrDados['DsEmail']}'
						,DsSenha = '".md5($arrDados["DsSenha"])."'				
					WHERE
						idUsuario = '{$arrDados['idUsuario']}' ";
		if(mysql_query($strSQL))
		{
			$strMsg = 'Senha alterada com sucesso! ';
			//header('location: index.php');
		   // echo "<script language='javascript'>
					// window.alert('Registro atualizados com sucesso!');
					// window.location=('listUsuario.php?acao=E&idUsuario={$arrDados["idUsuario"]}');
				// </script>";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
			// echo "<script language='javascript'>
					// window.alert('Houve um erro no banco de dados!');
					// window.location=('listUsuario.php?acao=E&idUsuario={$arrDados["idUsuario"]}');
				// </script>";
				//header('location: index.php');
		}
	}//fim da edição do registro
	echo "<div class='form-group' id='mensagem'>"		
			.$strMsg."<a href='index.php'> Logar no sistema</a>
	  	</div>";