<?php 
	require_once("topo.php");
	$arrDados = $_POST; 
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Movimentos cadastrados</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <form id="form" name="form" method="post" accept-charset="listMovimento.php">
                	<label for="fltMovimento">Pesquisar</label>
				 	<input class="form-control" name="fltMovimento" id="fltMovimento" placeholder="insira sua pesquisa.." value="<?php echo $arrDados["fltMovimento"]; ?>">
				</form>

			    <div class="table-responsive">
			        <table class="table table-striped table-bordered table-hover">
			            <thead>
			                <tr>
			                	<th>Data de cadastro</th>			                	
			                    <th>Categoria</th>			                    
			                    <th>Descrição</th>
			                    <th>Valor</th>
			                    <th>Tipo</th>
			                    <th>Status</th>
			                    <th>Ação</th>
			                </tr>
			            </thead>                    
						<?php
								
						$arrDados["fltMovimento"] = mysql_real_escape_string($arrDados["fltMovimento"]);					
						$strSQL = "SELECT 	
											u.NmUsuario, c.NmCategoria, m.idMovimento, date_format(m.DtMovimento, '%d/%m/%Y') AS DtMovimento,  
											m.FgTipo, m.DsMovimento, m.NuValor, m.FgStatus
									FROM 	
											tsUsuario AS u INNER JOIN tuMovimento As m
									ON 		
											u.idUsuario = m.tsUsuario_idUsuario	INNER JOIN teCategoria AS c  
									ON 		
											c.idCategoria = m.teCategoria_idCategoria											
									WHERE 
											1=1";
								//if de uma linha que trabalha os dois escopos true ou false de forma simplificada.		
						$strSQL .= (strlen($arrDados["fltMovimento"]) <= 0)?"" :" AND c.NmCategoria LIKE '%{$arrDados["fltMovimento"]}%'";
										
						$objRs = mysql_query($strSQL);								
						
						while ($objRow = mysql_fetch_array($objRs))
						{	
						
							echo "<tr>";							
							echo "<td> {$objRow['DtMovimento']} </td>";							
							echo "<td> {$objRow['NmCategoria']} </td>";							
							echo "<td> {$objRow['DsMovimento']} </td>";
							echo "<td> {$objRow['NuValor']} </td>";
							echo "<td>";
								echo($objRow[FgTipo] === 'D' ? 'Despesa': 'Receita');
							echo "</td>";
							echo "<td>";
								echo($objRow[FgStatus] === 'A' ? 'Ativo': 'Bloqueado');
							echo "</td>";
							echo "<td class='center'>
									<a class='btn btn-info' href='cadMovimento.php?idMovimento={$objRow["idMovimento"]}' title='Editar'>
										<img src='images/edit.png' alt='Editar' />
									</a>								
									<a class='btn btn-info' href='#' onclick='javascript: excluir({$objRow['idMovimento']});' title='Excluir'>
										<img src='images/delete.png' alt='Excluir' />
									</a>
								</td>";
						echo "</tr>";
						}
						
						?>
					</table>
					<div class="panel pull-right">        
						<a href="cadMovimento.php"><button class="btn btn-primary btn-sm" id="btnNovo" name="btnNovo" data-toggle="modal" data-target="#myModal" class="pull-right">
 							<span class="fa fa-plus"></span> &nbsp; Novo Movimento  
						</button></a>
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
								window.location="movimentos.php?idMovimento=" + pstrId + "&acao=D";
							};
						};
					</script>
					<?php require_once("rodape.php");