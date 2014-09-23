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
			                	<th>Código</th>
			                	<th>Data de cadastro</th>
			                    <th>Categoria</th>
			                    <th>Tipo</th>
			                    <th>Descrição</th>
			                    <th>Valor</th>
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
							echo "<td> {$objRow['idMovimento']} </td>";
							echo "<td> {$objRow['DtMovimento']} </td>";
							echo "<td> {$objRow['NmCategoria']} </td>";
							echo "<td>";
								echo($objRow[FgTipo] === 'D' ? 'Despesa': 'Receita');
							echo "</td>";
							echo "<td> {$objRow['DsMovimento']} </td>";
							echo "<td> {$objRow['NuValor']} </td>";
							echo "<td class='center'>
								<a href='editUsuario.php' title='Editar'>
									<img src='images/edit.png' alt='Editar' />
								</a>
								<a href='delUsuario.php' title='Excluir'>
									<img src='images/delete.png' alt='Excluir' />
								</a>
							</td>";
						echo "</tr>";
						}
						
						?>
					</table>
					<?php require_once("rodape.php");