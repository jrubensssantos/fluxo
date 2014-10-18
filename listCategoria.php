<?php 
	require_once("topo.php");
	$arrDados = $_POST;
?> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categorias cadastradas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <form id="form" name="form" method="post" accept-charset="listCategoria.php"> 
                	<div class="col-sm-5">               	
						<label for="fltNome">Pesquisar</label>
					 	<input class="form-control" name="fltNome" id="fltNome" placeholder="insira sua pesquisa.." value="<?php echo $arrDados["fltNome"]; ?>"><br />
					 </div>
					 <div class="col-sm-5">
						<label for="fltStatus">Status</label><br />
						<input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
						<?php 
							for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
							{ 
								echo $arrDados['fltStatus[$i]'] == "A" ? " checked = 'checked' " : "";
							}
						?>
						/> Ativo
						<input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
						<?php 
							for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
							{ 
								echo $arrDados['fltStatus[$i]'] == "B" ? " checked = 'checked' " : "";
							}
						?>/> Bloqueado
					</div>
				</form>
				<div class="col-sm-12">
				    <div class="table-responsive">
				        <table class="table table-striped table-bordered table-hover">
				            <thead>
				                <tr>
				                    <th>Código</th>
				                    <th>Categoria</th>
				                    <th>Status</th>
				                    <th>Ação</th>
				                </tr>
				            </thead>                    
							<?php
								$arrDados["fltNome"] = mysql_real_escape_string($arrDados["fltNome"]);  
								$strSQL = "SELECT idCategoria
												, NmCategoria
												, FgStatus
										FROM
												tecategoria
										WHERE
												1=1 ";
								$strSQL .= strlen($arrDados["fltNome"])<=0?"":" AND NmCategoria LIKE '%{$arrDados["fltNome"]}%' ";
								
								for($i=0;$i<count($arrDados["fltStatus"]);$i++)
								{
									$arrDados["fltStatus"][$i] = mysql_real_escape_string(trim($arrDados["fltStatus"][$i]));
									$strPidStatus .= ", '{$arrDados["fltStatus"][$i]}'";
								}
								$strPidStatus = substr($strPidStatus,1);
								$strSQL .= ($strPidStatus!="")?" AND FgStatus in ({$strPidStatus}) " :"";	
								
								//pdo
								$objRs = mysql_query($strSQL);					
								while($objRow = mysql_fetch_array($objRs))
								{
									echo "<tr>";
										echo "<td>{$objRow["idCategoria"]}</td>";
										echo "<td>{$objRow["NmCategoria"]}</td>";
										echo "<td>";
										echo ($objRow["FgStatus"]==="A")?"Ativo":"Bloqueado";
										echo "</td>";
										echo "<td class='center'>
												<a class='btn btn-info' href='cadCategoria.php?idCategoria={$objRow["idCategoria"]}' title='Editar'>
													<img src='images/edit.png' alt='Editar' />
												</a>
												<a class='btn btn-info' href='#' onclick='javascript: excluir({$objRow['idCategoria']});' title='Excluir'>
													<img src='images/delete.png' alt='Excluir' />
												</a>
											</td>";
									echo "</tr>";
								}
							?> 
						</table>
						<!-- Button trigger modal -->
	 					<div class="clear"></div>
	            			<div class="panel pull-right">        
								<a href="cadCategoria.php"><button class="btn btn-primary btn-sm" id="btnNovo" name="btnNovo" class="pull-right">
	 							<span class="fa fa-plus"></span> &nbsp; Nova Categoria  
								</button></a>
							</div>  
						</div>
					</div>
					<script language="javascript">
						function excluir(pstrId)
						{
							if(!window.confirm("Deseja realmente excluir o registo  " + pstrId + "?"))
							{
								return false; 
							}
							else
							{
								window.location="categorias.php?idCategoria=" + pstrId + "&acao=D";
							};
						};
					</script>
				<?php 
				require_once("rodape.php");