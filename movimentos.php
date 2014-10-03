<?php 
	require_once("topo.php");
	$arrDados = $_REQUEST; 
  	
	$arrDados["idMovimento"] = mysql_real_escape_string($arrDados["idMovimento"]);
	$arrDados["FgTipo"] = mysql_real_escape_string($arrDados["FgTipo"]);
	$arrDados["DtMovimento"] = mysql_real_escape_string($arrDados["DtMovimento"]);
	$arrDados["DsMovimento"] = mysql_real_escape_string($arrDados["DsMovimento"]);
	$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
	$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);		
	$arrDados["tsUsuario_idUsuario"] = mysql_real_escape_string($arrDados["tsUsuario_idUsuario"]);
	$arrDados["teCategoria_idCategoria"] = mysql_real_escape_string($arrDados["teCategoria_idCategoria"]);
	if((strlen($arrDados["idMovimento"])>0) && ($arrDados["acao"]==="E"))
	{		
		$strSQL = 	"
						UPDATE 
							fluxo.tuMovimentos
						SET
							 FgTipo = '{$arrDados['FgTipo']}'
							, DtMovimento = '{$arrDados['DtMovimento']}'
							, DsMovimento = '{$arrDados['DsMovimento']}'
							, NuValor = '{$arrDados['NuValor']}'
							, FgStatus = '{$arrDados['FgStatus']}'								
							, tsUsuario_idUsuario = '{$arrDados['idUsuario']}'	
							, teCategoria_idCategoria = '{$arrDados['idCategoria']}'					
						WHERE
							idMovimento = '{$arrDados['idMovimento']}' 
					";
		if(mysql_query($strSQL))
		{
		   echo "<script language='javascript'>
					window.alert('Registro atualizados com sucesso!');
					window.location=('listMovimento.php?acao=E&idMovimento={$arrDados["idMovimento"]}');
				</script>";
		}
		else
		{
			echo "<script language='javascript'>
					window.alert('Houve um erro no banco de dados!');
					window.location=('listMovimento.php?acao=E&idMovimento={$arrDados["idMovimento"]}');
				</script>";
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
			$strMsg = "O registro de código {$arrDados["idMovimento"]} foi excluido com sucesso";
		}
		else
		{
			$strMsg = "Erro no mysql. O adm foi avisado.";
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
								,'{$arrDados["idCategoria"]}'
							)
					";
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Registro inserido com sucesso: ";
		}
		else
		{
			$strMsg = "Erro no mysql. O adm foi avisado.";
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
		echo "	<div id='page-wrapper'>	
					<div class='row'>
	        			<div class='col-lg-12' id='mensagem'>
	            			".$strMsg."<a href='listMovimento.php'>Exibir cadastros</a>
	        			</div>        				
					</div>
				</div>";//fim mensagem para o usuário
		require_once("rodape.php");