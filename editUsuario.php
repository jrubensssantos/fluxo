<?php require_once("topo.php"); 
	$arrDados = $_GET;
	
	$arrDados["idUsuario"] = mysql_real_escape_string($arrDados["idUsuario"]);
	$idUsuario = $arrDados["idUsuario"]==""?0:$arrDados["idUsuario"];
	if($idUsuario!=0)
	{
		$strSQL = "SELECT
						 NmUsuario
						, DsEmail
					FROM
						tsUsuario
					WHERE
						idUsuario = '{$arrDados["idUsuario"]}' "; 
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
       <div id="page-wrapper">
            <h1>Cadastro de usuário</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
            			<form class="form-horizontal" name="formCadUser" id="formCadUser" action="usuarios.php" method="post">
							<div class="form-group">														
								<div class="col-sm-8">
									<label for="NmUsuario">Nome</label>
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-user"></span></div>
								      	<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $arrDados["idUsuario"]; ?>" />
								      	<input type="hidden" name="acao" id="acao" value="E" />								      	
								      	<input class="form-control" name="NmUsuario" id="NmUsuario" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmUsuario']; ?>">
									</div><span id="erron"></span>
								</div>                   
							</div>
       						<div class="form-group">					
								<div class="col-sm-8">
									<label for="DsEmail">Email</label>
									<div class="input-group">
								      	<div class="input-group-addon">@</div>								      	
								      	<input class="form-control" name="DsEmail" id="DsEmail" type="text" placeholder="Email" maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
									</div><span id="erroe"></span>										
								</div>                   
							</div>
				            <!-- <div class="form-group">					
								<div class="col-sm-6">
									<label for="DsSenha">Senha</label>
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-key"></span></div>								      	
								      	<input type="password" class="form-control" name="DsSenha" id="DsSenha" placeholder="Senha" maxlength="8" >
									</div><span id="erros"></span>										
								</div>                   
							</div>
				            <div class="form-group">					
								<div class="col-sm-6">
									<label for="ConfSenha">Confirma senha</label>
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-key"></span></div>								      	
								      	<input type="password" class="form-control" name="ConfSenha" id="ConfSenha" placeholder="Confirme a senha" maxlength="8" >
									</div><span id="errocs"></span>										
								</div>                   
							</div> --> 
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				        <a href="listUsuario.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				//function validaCampo(){
				document.getElementById("btnSalvar").onclick = function () 
				{
					var nome = document.getElementById("NmUsuario").value;			
					if(nome.length <= 3)
					{ 
						document.getElementById("erron").innerHTML="<font color='red'>O nome dever ter mais de 3 caracter</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erron").innerHTML="";
					};
					var email = document.getElementById("DsEmail").value;			
					if(email.length <= 10)
					{ 
						document.getElementById("erroe").innerHTML="<font color='red'>Digite um email válido</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erroe").innerHTML=""; 
					};
					// var senha = document.getElementById("DsSenha").value;			
					// if(senha.length < 4)
					// { 
						// document.getElementById("erros").innerHTML="<font color='red'>A senha dever ter no minimo 4 caracter</font>";
						// //window.alert("Este campo é obrigatório!");
						// return false;
					// }
					// else 
					// {
						// document.getElementById("erros").innerHTML="";
						// //
					// };
					// var senha = document.getElementById("DsSenha").value;
					// var confSenha = document.getElementById("ConfSenha").value;		
					// if(confSenha != senha)
					// { 
						// document.getElementById("errocs").innerHTML="<font color='red'>A senha é diferente da confirmação</font>";
						// //window.alert("Este campo é obrigatório!");
						// return false;
					// }
					// else 
					// {
						// document.getElementById("errocs").innerHTML="";
// 						
					// };
					document.getElementById("formCadUser").submit();   
				};
				//};
			</script>
			<?php require_once("rodape.php"); ?>