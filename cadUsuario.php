<?php require_once("topo.php"); 
	$idUsuario = $_GET["idUsuario"]==""?0:$_GET["idUsuario"];
	$strAcao = "I";
	if($idUsuario!=0)
	{
		$strSQL = "SELECT
						 NmUsuario
						, DsEmail
					FROM
						tsUsuario
					WHERE
						idUsuario = '".mysql_real_escape_string($idUsuario)."' "; 
	
		$objRs = mysql_query($strSQL);
		$objRow = mysql_fetch_array($objRs);
		$strAcao = "E";
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
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-user"></span></div>
								      	<input type="hidden" name="acao" id="acao" value="<?php echo $strAcao; ?>" />
								      	<label for="NmUsuario"></label>
								      	<input class="form-control" name="NmUsuario" id="NmUsuario" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmUsuario']; ?>">
									</div><span id="erron"></span>
								</div>                   
							</div>
       						<div class="form-group">					
								<div class="col-sm-8">
									<div class="input-group">
								      	<div class="input-group-addon">@</div>
								      	<label for="DsEmail"></label>
								      	<input class="form-control" name="DsEmail" id="DsEmail" type="text" placeholder="Email" maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
									</div><span id="erroe"></span>										
								</div>                   
							</div>
				            <div class="form-group">					
								<div class="col-sm-6">
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-key"></span></div>
								      	<label for="DsSenha"></label>
								      	<input type="password" class="form-control" name="DsSenha" id="DsSenha" type="text" placeholder="Senha" maxlength="8">
									</div><span id="erros"></span>										
								</div>                   
							</div>
				            <div class="form-group">					
								<div class="col-sm-6">
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-key"></span></div>
								      	<label for="ConfSenha"></label>
								      	<input type="password" class="form-control" name="ConfSenha" id="ConfSenha" type="text" placeholder="Confirme a senha" maxlength="8">
									</div><span id="errocs"></span>										
								</div>                   
							</div> 
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="salvarCat" id="salvarCat" class="btn btn-success">Salvar</button>
				        <a href="listUsuario.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				//function validaCampo(){
				document.getElementById("salvarCat").onclick = function () 
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
					var senha = document.getElementById("DsSenha").value;			
					if(senha.length < 8)
					{ 
						document.getElementById("erros").innerHTML="<font color='red'>A senha dever ter 8 caracter</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erros").innerHTML="";
						//
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
					document.getElementById("formCadUser").submit();   
				};
				//};
			</script>
<?php require_once("rodape.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Cadastro de usuários</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
        	<div class="panel panel-default">
                <div class="panel-body">
				<div class="modal-dialog">
					<div class="modal-content">
				      	<div class="modal-body">
				       		<form class="form-horizontal" name="formCadUser" id="formCadUser" action="usuarios.php" method="post">
								<div class="form-group">														
									<div class="col-sm-8">
										<div class="input-group">
									      	<div class="input-group-addon"><span class="fa fa-user"></span></div>
									      	<input type="hidden" name="acao" id="acao" value="<?php echo $strAcao; ?>" />
									      	<label for="NmUsuario"></label>
									      	<input class="form-control" name="NmUsuario" id="NmUsuario" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmUsuario']; ?>">
										</div><span id="erron"></span>
									</div>                   
								</div>
								
				<?php require_once("rodape.php"); ?>