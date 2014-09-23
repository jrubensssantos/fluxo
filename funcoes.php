<?php
	inicializa();
	function inicializa()
	{
		if (file_exists(dirname(__FILE__).'/config.php')) 
		{
			require_once(dirname(__FILE__).'/config.php');
		}
		else
		{
			die(utf8_decode("O arquivo de configuração não foi localizado, contate o administrador!"));
		}
		
		$constantes = array('BASEPATH', 'BASEURL', 'FLUXOURL', 'CLASSPATH', 'MODELPATH', 'CSSPATH', 'JSPATH', 'DBHOST', 'DBUSER', 'DBPASS', 'DBNAME');
		foreach($constantes as $valor) 
		{
			if (!defined($valor)) 
			{
				die(utf8_decode("Você precisa configurar ".$valor." do sistema está ausente!"));
			}
		}
		
		require_once(BASEPATH.CONTROLPATH.'autoload.php');
		if($_GET['logoff'] == TRUE){
			$user = new usuario();
			$user -> doLogout();
			exit();
		}
	}//fim da funcao inicializa
	
	function loadCSS($arquivo=null, $media='screen', $import=FALSE)
	{
		if ($arquivo != NULL) 
		{
			if ($import == TRUE) 
			{
				echo '<style type="text/css">@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>'."\n";
			} 
			else 
			{
				echo'<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />'."\n";
			}
		}
	}//fim da funcao loadCSS para carregamento dinamico dos arquivos de folha de estilo css
	
	function loadJS($arquivo=null,$remoto=FALSE)
	{
		if ($arquivo != NULL) 
		{
			if ($remoto == FALSE) $arquivo = BASEURL.JSPATH.$arquivo.'.js';
			echo '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";
		}
	}//fim da função loadJS para carregamento dinamico dos arquivos javascript
	
	function loadModel($model=null, $view=null)
	{
		if ($model==null || $view==null) 
		{
			echo '<p>Erro na função<strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução!</p>';
		} 
		else 
		{
			if (file_exists(MODELPATH."$model.php")) {
				include_once (MODELPATH."$model.php");
			} 
			else 
			{
				echo '<p>Módulo inexistente neste sistema!</p>';
			}
		}	
	}//fim da função loadModel para carregar os model e telas do sistema
	
	function protegeArquivo($nomeArquivo, $redirPara='index.php?erro=3')
	{
		$url = $_SERVER['PHP_SELF'];
		if(preg_match("/$nomeArquivo/i", $url))
		{
			redireciona($redirPara);
		}
	}//fim da função protegeArquivo
	
	function redireciona($url='')
	{
		header("Location: ".BASEURL.$url);
	}//fim da função redireciona 
	
	function codificaSenha($senha)
	{
		return md5($senha);
	}//fim da funcao condificaSenha
	
	function isAdmin(){
		verificaLogin();
		$sessao = new sessao();
		$user = new usuario(array('FgAdmin' => NULL,));
		$iduser = $sessao -> getVar('idUsuario');
		$user -> extras_select = " WHERE idUsuario=$iduser";
		$user -> selecionaCampo($user);
		$res = $user -> retornaDados();
		if (strtoupper($res -> FgAdmin) == 'S') 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}//fim da funcao isAdmin verifica se o usuário é administrador ou nao
	
	function verificaLogin()
	{
		$sessao = new sessao();
		if ($sessao -> getNvars() <= 0 || $sessao -> getVar('logado') != TRUE || $sessao -> getVar('ip') != $_SERVER['REMOTE_ADDR'])
		{
			redireciona('?erro=3');		
		}
	}//fim da funcao verifica login verifica se o usuario esta logado ou nao
	
	function printMSG($msg=null, $tipo=null)
	{
		if ($msg != NULL) 
		{
			switch ($tipo) 
			{
				case 'erro':
					echo '<div class="erro">'.$msg.'</div>';
					break;
				case 'alerta':
					echo '<div class="alerta">'.$msg.'</div>';
					break;
				case 'pergunta':
					echo '<div class="pergunta">'.$msg.'</div>';
					break;
				case 'sucesso':
					echo '<div class="sucesso">'.$msg.'</div>';
					break;
				default:
					echo '<div class="sucesso">'.$msg.'</div>';
					break;
			}		
		}
	}//fim da funcao printMSG serve para inprimir as mensagem do sistema erro, aleta, etc
	
	function antiInject($string)
	{
	// remove palavras que contenham sintaxe sql
		$string = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i","",$string);
		//limpa espacos vazios
		$string = trim($string);
		//tira tags html e php
		$string = strip_tags($string);
		if(!get_magic_quotes_gpc())
			//Adiciona barras invertidas a uma string para escapar a string.
			$string = addslashes($string);
		return $string;
	}//fim da funcao antiInject evita o sqlInjection