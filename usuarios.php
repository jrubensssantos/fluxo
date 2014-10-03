<?php 
	require_once("topo.php");
	$arrDados = $_REQUEST; 
  	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
	$arrDados["idUsuario"] = mysql_real_escape_string($arrDados["idUsuario"]);
	$arrDados["NmUsuario"] = mysql_real_escape_string($arrDados["NmUsuario"]);
	$arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
	$arrDados["DsSenha"] = mysql_real_escape_string($arrDados["DsSenha"]);
	
	if((strlen($arrDados["idUsuario"]) > 0) && ($arrDados["acao"] === "E"))
	{		
		$strSQL = "	UPDATE 
						fluxo.tsUsuario
					SET
						NmUsuario = '{$arrDados['NmUsuario']}'
						,DsEmail = '{$arrDados['DsEmail']}'
						,DsSenha = '{$arrDados['DsSenha']}'				
					WHERE
						idUsuario = '{$arrDados['idUsuario']}' ";
		if(mysql_query($strSQL))
		{
			$strMsg = 'Registro(s) atualizado(s) com sucesso! ';
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
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idUsuario"]) > 0) && ($arrDados["acao"] === "D"))
	{
		$arrDados["idUsuario"] = mysql_real_escape_string ($arrDados["idUsuario"]);
		$strSQL = "DELETE FROM 
						fluxo.tsUsuario 
					WHERE 
						idUsuario = '".$arrDados["idUsuario"]."'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "O registro de código ".$arrDados["idUsuario"]." foi excluido com sucesso ";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
		}
	
	}//fim do delete
	
    else
	{
		if(strlen($arrDados["NmUsuario"]) <= 3)
		{
			
			header("Location: cadUsuario.php");
			$strMsg = "O campo categoria tem que ter mais de 3 caracteres ";
			exit();
		}
	
		$arrDados["NmUsuario"] = mysql_real_escape_string($arrDados["NmUsuario"]);
		$arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
		$arrDados["DsSenha"] = mysql_real_escape_string($arrDados["DsSenha"]);	
		$strSQL = "INSERT INTO 
							fluxo.tsUsuario(NmUsuario, DsEmail, DsSenha) 
					VALUES 
							('".$arrDados["NmUsuario"]."', '".$arrDados["DsEmail"]."', '".codificaSenha($arrDados["DsSenha"])."')";
		if(mysql_query($strSQL))
		{ 
			$strMsg = 'Usuário cadastrado com sucesso! ';
		}
		else
		{
			$strMsg = "Erro no query ".mysql_error()." O administrador foi avisado. ";
			/*
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			
			$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
			$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
			$headers .= 'Cco: birthdayarchive@example.com' . "\r\n";
			$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	       */ 			
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
	
		}
	}//fim do inserte
	
	echo "<div id='page-wrapper'>	
			<div>
        		<div class='col-lg-12' id='mensagem'>
            		";
				echo $strSQL.
		var_dump($arrDados).$strMsg."<a href='listUsuario.php'>Exibir cadastros</a>
        		</div>        				
    		</div><!-- /.col-lg-12 -->";//fim mensagem para o usuário
	require_once("rodape.php");