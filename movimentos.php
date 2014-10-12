<?php 
	require_once("topo.php");
	$arrDados = $_REQUEST; 
  	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
	$arrDados["idMovimento"] = mysql_real_escape_string($arrDados["idMovimento"]);
	$arrDados["FgTipo"] = mysql_real_escape_string($arrDados["FgTipo"]);
	$arrDados["DtMovimento"] = mysql_real_escape_string($arrDados["DtMovimento"]);
	$arrDados["DsMovimento"] = mysql_real_escape_string($arrDados["DsMovimento"]);
	$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
	$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);		
	$arrDados["tsUsuario_idUsuario"] = mysql_real_escape_string($arrDados["tsUsuario_idUsuario"]);
	$arrDados["idCategoria"] = mysql_real_escape_string($arrDados["idCategoria"]);
	
	if((strlen($arrDados["idMovimento"]) > 0) && ($arrDados["acao"]==="E"))
	{		
		$strSQL = 	"
						UPDATE 
							fluxo.tuMovimento
						SET
							 FgTipo = '{$arrDados['FgTipo']}'
							, DtMovimento = '{$arrDados['DtMovimento']}'
							, DsMovimento = '{$arrDados['DsMovimento']}'
							, NuValor = '{$arrDados['NuValor']}'
							, FgStatus = '{$arrDados['FgStatus']}'								
							, tsUsuario_idUsuario = '{$arrDados['tsUsuario_idUsuario']}'	
							, teCategoria_idCategoria = '{$arrDados['teCategoria_idCategoria']}'					
						WHERE
							idMovimento = '{$arrDados['idMovimento']}' 
					";
		if(mysql_query($strSQL))
		{
			$strMsg = 'Registro(s) atualizado(s) com sucesso! ';
		   // echo "<script language='javascript'>
					// window.alert('Registro atualizados com sucesso!');
					// window.location=('listMovimento.php?acao=E&idMovimento={$arrDados["idMovimento"]}');
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
					// window.location=('listMovimento.php?acao=E&idMovimento={$arrDados["idMovimento"]}');
				// </script>";
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idMovimento"]) > 0) && ($arrDados["acao"] === "D"))
	{
		$arrDados["idMovimento"] = mysql_real_escape_string($arrDados["idMovimento"]);
		
		$strSQL = 	"
						DELETE FROM 
							fluxo.tuMovimento 
						WHERE 
							idMovimento = '{$arrDados["idMovimento"]}'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "O registro de código {$arrDados["idMovimento"]} foi excluido com sucesso! ";
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
		/*if(strlen($arrDados["NmUsuario"]) <= 3)
		{
			
			header("Location: cadUsuario.php");
			$strMsg = "O campo categoria tem que ter mais de 3 caracteres";
			exit();
		}*/

		$arrDados["idMovimento"] = mysql_real_escape_string($arrDados["idMovimento"]);
		$arrDados["FgTipo"] = mysql_real_escape_string($arrDados["FgTipo"]);
		$arrDados["DtMovimento"] = mysql_real_escape_string($arrDados["DtMovimento"]);
		$arrDados["DsMovimento"] = mysql_real_escape_string($arrDados["DsMovimento"]);
		$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
		$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);		
		$arrDados["tsUsuario_idUsuario"] = mysql_real_escape_string($arrDados["tsUsuario_idUsuario"]);
		$arrDados["idCategoria"] = mysql_real_escape_string($arrDados["idCategoria"]);	
		
		$strSQL = 	"	
						INSERT INTO 
							fluxo.tuMovimento
							(	
								FgTipo, DtMovimento, DsMovimento, NuValor, FgStatus
								, tsUsuario_idUsuario, teCategoria_idCategoria) 
						VALUES 
							(
								'{$arrDados["FgTipo"]}'
								,'{$arrDados["DtMovimento"]}'
								,'{$arrDados["DsMovimento"]}'
								,'{$arrDados["NuValor"]}'
								,'{$arrDados["FgStatus"]}'
								,'{$arrDados["tsUsuario_idUsuario"]}'
								,'{$arrDados["teCategoria_idCategoria"]}'
							)
					";
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Movimento cadastrado com sucesso! ";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";			
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
            		.$strMsg."<a href='listMovimento.php'> Exibir cadastros</a>      				
    			</div>";//fim mensagem para o usuário
		require_once("rodape.php");