<?php require_once("topo.php");
	$arrDados = $_GET;
	
	$arrDados["idCategoria"] = mysql_real_escape_string($arrDados["idCategoria"]); 
	$idCategoria = $arrDados["idCategoria"]==""?0:$_GET["idCategoria"];
	if($idCategoria!=0)
	{
		$strSQL = "SELECT
						 NmCategoria
						, FgStatus
					FROM
						teCategoria
					WHERE
						idCategoria = '{$arrDados["idCategoria"]}' "; 
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
       <div id="page-wrapper">
            <h1>Cadastro de categoria</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
            			<form class="form-horizontal" name="formCadCat" id="formCadCat" action="categorias.php" method="post">
							<div class="form-group">														
								<div class="col-sm-5">
									<label for="NmCategoria">Categoria</label>
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-cat"></span></div>
								      	<input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $arrDados["idCategoria"]; ?>" />
								      	<input type="hidden" name="acao" id="acao" value="E" />								      	
								      	<input class="form-control" name="NmCategoria" id="NmCategoria" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmCategoria']; ?>">
									</div><span id="erron"></span>
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-3">
									<label for="FgStatus">Status</label><br />
									<div class="input-group">
										<div class="input-group-addon"></div>						      	
										<select id="FgStatus" name="FgStatus" class="form-control">
											<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
											<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
											</select> 
										<br />
									</div><span id="errof"></span>
								</div>                   
							</div>				            
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				        <a href="listCategoria.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				//function validaCampo(){
				document.getElementById("btnSalvar").onclick = function () 
				{
					var nome = document.getElementById("NmCategoria").value;			
					if(nome.length <= 3)
					{ 
						document.getElementById("erron").innerHTML="<font color='red'>O nome da categoria dever ter no minimo 3 caracter</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erron").innerHTML="";
					};
					var FgStatus = document.getElementById("FgStatus").value;			
					if(FgStatus == "")
					{ 
						document.getElementById("errof").innerHTML="<font color='red'>Escolha uma opção para o status</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("errof").innerHTML="";
					};
					
					document.getElementById("formCadCat").submit();   
				};
				//};
			</script>
		<?php require_once("rodape.php"); ?>