<?php
require_once("conexao.php");
$arrDados = $_POST;

$arrDados['DsEmail'] = mysql_real_escape_string($arrDados["DsEmail"]);
$StrSQL = "SELECT 
				idUsuario
				, NmUsuario
				, DsEmail 
			FROM 
				tsUsuario 
			WHERE DsEmail = '{$arrDados['DsEmail']}' ";

$objRs = mysql_query($StrSQL);
$objRow = mysql_fetch_array($objRs);

if($objRow["DsEmail"] === $arrDados["DsEmail"])
{
	?>
	<link href="css/bootstrap.min.css" rel="stylesheet">
        
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        
		<link href="css/style.css" rel="stylesheet">
			<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		  <div class="modal-content">
		      <div class="modal-header">
		          <h1 class="text-center"><img src="images/logo.png" width="250" alt="logo"/></h1>
		      </div>
		      <div class="modal-body">
	          <form class="form col-md-12 center-block" method="post" id="formRecSenha" name="formRecSenha" action="recuperaSenhaAcao.php">
          			<div class="form-group" id="mensagem">
						<?php	
							echo "Ola, ".$objRow['NmUsuario']." foi enviado um email com um link para o seu email com sua nova senha!";
						?>
			      	</div>
		            <div class="form-group">
		              <a href="index.php" <button class="btn btn-primary btn-lg btn-block" id="btnEnviar">Voltar para login</button></a>
		            </div>
	          </form>
	          </div>
		      <div class="modal-footer">
						
		      </div>	

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	<?php
} 
else
{
	//header("location:index.php");
	echo "Este email não esta cadastrado no sistema!<a href='recuperaSenha.php'>digite o email novamente!</a>";
}