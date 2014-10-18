<?php 
	require_once("topo.php");
	$arrDados = $_REQUEST; 
	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
  	$arrDados["idCategoria"] = mysql_real_escape_string($arrDados["idCategoria"]);
	$arrDados["NmCategoria"] = mysql_real_escape_string($arrDados["NmCategoria"]);
	$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);
	
	if((strlen($arrDados["idCategoria"]) > 0) && ($arrDados["acao"] === "E"))
	{

		$strSQL = 	"	UPDATE 
							fluxo.teCategoria
						SET
							 NmCategoria = 	'{$arrDados['NmCategoria']}'						
							,FgStatus = 	'{$arrDados['FgStatus']}'									
						WHERE
							idCategoria = 	'{$arrDados['idCategoria']}' 
					";
		if(mysql_query($strSQL))
		{
		   $strMsg = 'Categoria atualizado com sucesso! ';
		   		// <script language='javascript'>
					// window.alert('Registro atualizados com sucesso!');
					// window.location=('cadCategoria.php?acao=idCategoria={$arrDados["idCategoria"]}');
				// </script>";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
				// "<script language='javascript'>
					// window.alert('Houve um erro no banco de dados!');
					// window.location=('cadCategorias.php?idCategoria={$arrDados["idCategoria"]}');
				// </script>";
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idCategoria"]) > 0) && ($arrDados["acao"] === "D"))
	//else if ((strlen($arrDados["idCategoria"]) > 0) && ($arrDados["acao"] === "D"))
	{
		
		$arrDados["idCategoria"] = mysql_real_escape_string ($arrDados["idCategoria"]);
		$strSQL = "DELETE FROM fluxo.teCategoria 
					WHERE 
					idCategoria = '{$arrDados["idCategoria"]}'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "O código ".$arrDados["idCategoria"]." foi excluida com sucesso. ";
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
		if(strlen($arrDados["NmCategoria"]) <= 3)
		{
			//var_dump($arrDados);
			header("Location: cadCategoria.php");
			$strMsg = "O campo categoria tem que ter mais de 3 caracteres";
			exit();
		}
		if(strlen($arrDados["FgStatus"]) == -1 )
		{
			//var_dump($arrDados);
			header("Location: cadCategoria.php");
			$strMsg = "Marque uma opção do para o status";
			exit();
		}
	
		$arrDados["NmCategoria"] = mysql_real_escape_string($arrDados["NmCategoria"]);
		$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);
		$strSQL = 	"		
						INSERT INTO 
							fluxo.teCategoria(NmCategoria, FgStatus) 
						VALUES 
						(
							'{$arrDados["NmCategoria"]}'
							,'{$arrDados["FgStatus"]}'	
						)
	  				";	
						
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Categoria cadastrada com sucesso! ";
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
			<div class='row'>
        		<div class='col-lg-12' id='mensagem'>"
            		.$strMsg."<a href='listCategoria.php'> Exibir cadastros</a>      				
    			</div>";//fim mensagem para o usuário
	require_once("rodape.php");