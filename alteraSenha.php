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
		          		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $objRow["idUsuario"]; ?>" />
		          		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $objRow["DsEmail"]; ?>" />
		          		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $objRow["NmUsuario"]; ?>" />
		          		<div class="form-group" id="mensagem">
							<?php	
								echo "Ola, ".$objRow['NmUsuario']." digite sua nova senha!";
							?>
				      	</div>
		            <div class="form-group">
		            	<label for="DsSenha">Senha</label>
		              	<input type="password" class="form-control input-lg" placeholder="Digite a nova senha" autofocus="autofocus" id="DsSenha" name="DsSenha" required>
		            </div><span id="erros"></span>
		            <div class="form-group">
		            	<label for="ConfSenha">Confirma a senha</label>
		              	<input type="password" id="ConfSenha" name="ConfSenha" class="form-control input-lg" maxlength="8" placeholder="Digite a confirmação" required>
		            </div><span id="errocs"></span>
		            <div class="form-group">
		              <button class="btn btn-primary btn-lg btn-block" id="btnEnviar">Enviar</button>
		            </div>
		          </form>
	          	<script language="javascript">
	          	//function validaCampo(){
				document.getElementById("btnEnviar").onclick = function () 
				{
					var senha = document.getElementById("DsSenha").value;			
					if(senha.length < 4)
					{ 
						document.getElementById("erros").innerHTML="<font color='red'>A senha dever ter no minimo 4 caracter</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erros").innerHTML="";
						
					};
					var senha = document.getElementById("DsSenha").value;
					var confSenha = document.getElementById("ConfSenha").value;		
					if(confSenha != senha)
					{ 
						document.getElementById("errocs").innerHTML="<font color='red'>A senha é diferente da confirmação</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("errocs").innerHTML="";
						
					};
					document.getElementById("formRecSenha").submit();   
				};
				//};
			</script>
		      </div>
		      <div class="modal-footer">
						
		      </div>
		  </div>
		  </div>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	<?php
} 
else
{
	//header("location:index.php");
	echo "Este email não esta cadastrado no sistema!, <a href='recuperaSenha.php'>digite o email novamente!</a>";
}