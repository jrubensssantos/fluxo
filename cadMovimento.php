<?php require_once("topo.php"); ?>
<div id="page-wrapper">
	<h1>Cadastro de movimento</h1>
    <div class="col-lg-12">      
		<div class="col-lg-12">
			<div class="panel panel-default">
            	<div class="panel-body">            
		            <form class="form-horizontal">
		            	<div class="form-group">					
							<div class="col-sm-2">
								<label for="DtMovimento">Data de Cadastro</label>
								<input type="date" class="form-control" rows="5" placeholder="Data" />
							</div>
						</div>
		            	<div class="form-group">					
							<div class="col-sm-6">
								<label for="NmUsuario">Usuário</label>
								<select class="form-control">
		                        	<option>Jhouper</option>
									<option>Ale</option>
		                            <option>Brayner</option>
								</select>
							</div>
						</div>
		            	<div class="form-group">					
							<div class="col-sm-6">
								<label for="NmCategoria">Categoria</label>
								<select class="form-control">
		                        	<option>Escola</option>
									<option>Escritório</option>
		                            <option>Casa</option>
								</select>
							</div>
						</div>
		               	<div class="form-group">					
							<div class="col-sm-6">
								<label for="FgTipo">Tipo</label>
								<select class="form-control">		                  
		                        	<option>Receita</option>
									<option>Despesa</option>					                      							
								</select>
							</div>
						</div>						
						<div class="form-group">					
							<div class="col-sm-6">
								<label for="DsMovimento">Descrição do movimento</label>
								<textarea class="form-control" rows="5" placeholder="Descrição"></textarea>
							</div>
						</div>	
		                <div class="form-group">					
							<div class="col-sm-6">
								<label for="NuValor">Valor</label>
								<input class="form-control" placeholder="Valor" />
							</div>
						</div>   							
						<div class="form-group">        
							<div class="col-sm-8">                    
								<button type="button" class="btn btn-success">Salvar</button>
		                		<button type="reset" class="btn btn-danger">Cancelar</button>
							</div>						
						</div>
					</form>                              
	          	</div>
			</div>	            
<?php require_once("rodape.php"); ?>