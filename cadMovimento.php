<?php require_once("topo.php");
	$arrDados = $_GET;
	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
	$arrDados["idMovimento"] = mysql_real_escape_string($arrDados["idMovimento"]);
	$arrDados["FgTipo"] = mysql_real_escape_string($arrDados["FgTipo"]);
	$arrDados["DtMovimento"] = mysql_real_escape_string($arrDados["DtMovimento"]);
	$arrDados["DsMovimento"] = mysql_real_escape_string($arrDados["DsMovimento"]);
	$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
	$arrDados["FgStatus"] = mysql_real_escape_string($arrDados["FgStatus"]);		
	$arrDados["tsUsuario_idUsuario"] = mysql_real_escape_string($arrDados["tsUsuario_idUsuario"]);
	$arrDados["teCategoria_idCategoria"] = mysql_real_escape_string($arrDados["teCategoria_idCategoria"]);
	 
	$idMovimento = $_GET["idMovimento"]==""?0:$_GET["idMovimento"];
	if($idMovimento!=0)
	{
		$strSQL = "	SELECT 	
							m.DtMovimento
							, m.DsMovimento
							, m.FgTipo
							, m.NuValor
							, m.FgStatus
							, m.teCategoria_idCategoria
							, m.tsUsuario_idUsuario
					FROM 	
							tuMovimento AS m											
					WHERE 
							idMovimento = '{$arrDados["idMovimento"]}' ";
		// $strSQL = "	SELECT 	
							// u.NmUsuario, c.NmCategoria, m.idMovimento, m.DtMovimento,  
							// m.FgTipo, m.DsMovimento, m.NuValor, m.FgStatus
					// FROM 	
							// tsUsuario AS u INNER JOIN tuMovimento As m
					// ON 		
							// u.idUsuario = m.tsUsuario_idUsuario	INNER JOIN teCategoria AS c  
					// ON 		
							// c.idCategoria = m.teCategoria_idCategoria											
					// WHERE 
							// idMovimento = '{$arrDados["idMovimento"]}' ";
						
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
       <div id="page-wrapper">
            <h1>Cadastro de movimentos</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
            			<form class="form-horizontal" name="formCadMov" id="formCadMov" action="movimentos.php" method="post">            				
							<div class="form-group">														
								<div class="col-sm-3">
									<label for="DtMovimento">Data de cadastro</label>
									<div class="input-group">
								      	<div class="input-group-addon"></div>
								      	<input type="hidden" name="acao" id="acao" value="E" />
								      	
								      	<input type="hidden" name="idMovimento" id="idMovimento" value="<?php echo $arrDados['idMovimento']; ?>" />
								      	<input type="hidden" name="tsUsuario_idUsuario" id="tsUsuario_idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>" />
								      	<!-- <input type="hidden" class="form-control" name="DtMovimento" id="DtMovimento" value="<?php echo date_format(m.DtMovimento, '%d/%m/%Y'); ?>"> -->
								      	<!-- <input type="text" name="teCategoria_idCategoria" id="teCategoria_idCategoria" value="<?php echo "idCategoria".$arrDados['idCategoria']; ?>" />	 -->							      	
								      	
								      	<input type="date" class="form-control" name="DtMovimento" id="DtMovimento" value="<?php echo $objRow['DtMovimento']; ?>">							      	
									</div><span id="erro"></span>
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-4">
									<label for="FgStatus">Status</label><br />
									<div class="input-group">
										<div class="input-group-addon"></div>					
										<select id="FgStatus" name="FgStatus" class="form-control">
											<option>Selecione o status</option>
											<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
											<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
										</select> 
										<br />
									</div><span id="errof"></span>
								</div>                   
							</div>							
       						<div class="form-group">					
								<div class="col-sm-4">
									<label for="DsEmail">Categoria</label>
									<div class="input-group">
								      	<div class="input-group-addon"></div>								      	
								      	<select id="teCategoria_idCategoria" name="teCategoria_idCategoria" class="form-control">
								      		<option>Selecione a categoria</option>
								      		<?php 
									      		$strSQL = "	SELECT 	idCategoria
																	, NmCategoria
																	, FgStatus 
															FROM 
																	teCategoria 
															WHERE 
																	1 = 1";
												$objRs = mysql_query($strSQL);
													
									      		while ($retorna = mysql_fetch_array($objRs))
												{		
													echo"<option value='{$retorna['idCategoria']}'>
															{$retorna['NmCategoria']}
														</option>";
												}
											?>
										</select>
									</div>									
								</div>                   
							</div>						
							<div class="form-group">
								<div class="col-sm-4">
									<label for="FgTipo">Tipo</label>
									<div class="input-group">
										<div class="input-group-addon"></div>
								      	<select id="FgTipo" name="FgTipo" class="form-control">
								      		<option>Selecione o tipo</option>
											<option value="D" <?php echo $objRow["FgTipo"]==="D"?" selected = 'selected' ":""; ?> >Dispesa</option>
											<option value="R" <?php echo $objRow["FgTipo"]==="R"?" selected = 'selected' ":""; ?> >Receita</option>
											</select> 
										<br />	
									</div><span id="errof"></span>
								</div>                   
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label for="DsMovimento">Descrição do movimento</label>
									<div class="input-group">
								      	<div class="input-group-addon"></div>	      	
								      	<input type="text" class="form-control" name="DsMovimento" id="DsMovimento" placeholder="Descrição do movimento" maxlength="255" value="<?php echo $objRow['DsMovimento']; ?>" />
									</div>
								</div> 
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label for="NuValor">Valor</label>
									<div class="input-group">
								      	<div class="input-group-addon">R$</div>									      	
								      	<input class="form-control" name="NuValor" id="NuValor" type="text" placeholder="Valor" maxlength="10" value="<?php echo $objRow['NuValor']; ?>">
									</div>
								</div> 
							</div>				           
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				        <a href="listMovimento.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				//function validaCampo(){
				document.getElementById("btnSalvar").onclick = function () 
				{
					var nome = document.getElementById("DtMovimento").value;			
					if(nome.length == "")
					{ 
						document.getElementById("erro").innerHTML="<font color='red'>Campo data é obrigatório</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erro").innerHTML="";
						
					};
					document.getElementById("formCadMov").submit();   
				};
				//};
			</script>
			<?php require_once("rodape.php"); ?>