<?php 
	require_once("topo.php");
	$arrDados = $_POST;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Usuários cadastrados</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <form id="form" name="form" method="post" accept-charset="listUsuario.php">
                	<label for="fltEmail"></label>
				 	<input class="form-control" name="fltEmail" id="fltEmail" placeholder="insira sua pesquisa..">
				</form>

			    <div class="table-responsive">
			        <table class="table table-striped table-bordered table-hover">
			            <thead>
			                <tr>
			                    <th>Nome</th>
			                    <th>E-mail</th>
			                    <th>Ação</th>
			                </tr>
			            </thead>                    
						<?php						
						$strSQL = "SELECT idUsuario, NmUsuario, DsEmail, DsSenha FROM tsUsuario WHERE 1=1";
								//if de uma linha que trabalha os dois escopos true ou false de forma simplificada.		
						$strSQL .= (strlen($arrDados["fltEmail"]) <= 0)?"" :" AND DsEmail LIKE '%".mysql_real_escape_string($arrDados["fltEmail"])."%'";				
						$objRs = mysql_query($strSQL);
						
						while ($objRow = mysql_fetch_array($objRs))
						{	
						
							echo "<tr>";
							echo "<td> {$objRow['NmUsuario']} </td>";
							echo "<td> {$objRow['DsEmail']} </td>";
							echo "<td class='center'>
								<a class='btn btn-info' href='editUsuario.php?idUsuario={$objRow["idUsuario"]}' title='Editar'>
									<img src='images/edit.png' alt='Editar' />
								</a>
								<a class='btn btn-info' href='mudaSenha.php?idUsuario={$objRow["idUsuario"]}' title='Mudar senha'>
									<img src='images/pass.png' alt='Mudar senha' />
								</a>
								<a class='btn btn-info' href='#' onclick='javascript: excluir({$objRow['idUsuario']});' title='Excluir'>
									<img src='images/delete.png' alt='Excluir' />
								</a>								
							</td>";
						echo "</tr>";
						}
						
						?>
					</table>

            		<div class="panel pull-right">        
						<a href="cadUsuario.php"><button class="btn btn-primary btn-sm" id="btnNovo" name="btnNovo" data-toggle="modal" data-target="#myModal" class="pull-right">
 							<span class="fa fa-plus"></span> &nbsp; Novo Usuário  
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
								window.location="usuarios.php?idUsuario=" + pstrId + "&acao=D";
							};
						};
					</script>	
					<?php require_once("rodape.php");