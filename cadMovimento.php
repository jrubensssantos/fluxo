<?php require_once("topo.php"); 
	$idMovimento = $_GET["idMovimento"]==""?0:$_GET["idMovimento"];
	$strAcao = "I";
	if($idMovimento!=0)
	{
		$strSQL = "	SELECT 	
							u.NmUsuario, c.NmCategoria, m.idMovimento, date_format(m.DtMovimento, '%d/%m/%Y') AS DtMovimento,  
							m.FgTipo, m.DsMovimento, m.NuValor, m.FgStatus
					FROM 	
							tsUsuario AS u INNER JOIN tuMovimento As m
					ON 		
							u.idUsuario = m.tsUsuario_idUsuario	INNER JOIN teCategoria AS c  
					ON 		
							c.idCategoria = m.teCategoria_idCategoria											
					WHERE 
							idMovimento = '".mysql_real_escape_string(idMovimento)."' ";
						
	
		$objRs = mysql_query($strSQL);
		$objRow = mysql_fetch_array($objRs);
		$strAcao = "E";
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
									<div class="input-group">
								      	<div class="input-group-addon"></div>
								      	<input type="hidden" name="acao" id="acao" value="<?php echo $strAcao; ?>" />
								      	<input type="hidden" name="tsUsuario_idUsuario" id="tsUsuario_idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>" />
								      	<label for="DtMovimento"></label>
								      	<input class="form-control" name="DtMovimento" id="DtMovimento" type="date" placeholder="24/09/2014" maxlength="100" value="<?php echo $objRow['DtMovimento']; ?>">
									</div><span id="erro"></span>
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-8">
									<div class="input-group">								      	
								      	<label for="FgStatus"></label> <br />	
										<input type="radio" name="FgStatus" id="FgStatus" checked="checked" value="A"	/> Ativo
										<input type="radio" name="FgStatus" id="FgStatus" value="B"	/> Bloqueado
									</div><span id="errof"></span>
								</div>                   
							</div>							
       						<div class="form-group">					
								<div class="col-sm-4">
									<div class="input-group">
								      	<div class="input-group-addon"></div>
								      	<label for="DsEmail"></label>
								      	<select id="idCategoria" name="idCategoria" class="form-control">
								      		<option>Selecione uma categoria</option>
								      		<?php 
								      		$strSQL = "	SELECT 	idCategoria
																, NmCategoria
																, FgStatus 
														FROM 
																teCategoria 
														WHERE 
																1=1";
											$objRs = mysql_query($strSQL);
											
								      		while ($objRow = mysql_fetch_array($objRs))
											{		
												echo"<option value='{$objRow['idCategoria']}'>
														{$objRow['NmCategoria']}
													</option>";
											}?>
										</select>
									</div>									
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-8">
									<div class="input-group">								      	
								      	<label for="FgTipo"></label> <br />	
										<input type="radio" name="FgTipo" id="FgTipo" checked="checked" value="D"	/> Dispesa
										<input type="radio" name="FgTipo" id="FgTipo" value="R"	/> Receita
									</div><span id="errof"></span>
								</div>                   
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<div class="input-group">
								      	<div class="input-group-addon"></div>							      	
								      	<label for="DsMovimento"></label>
								      	<input class="form-control" name="DsMovimento" id="DsMovimento" type="textarea" placeholder="Descrição do movimento" maxlength="255" value="<?php echo $objRow['DsMovimento']; ?>">
									</div>
								</div> 
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<div class="input-group">
								      	<div class="input-group-addon">R$</div>							      	
								      	<label for="NuValor"></label>
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