<?php require_once("topo.php"); 
	$idCategoria = $_GET["idCategoria"]==""?0:$_GET["idCategoria"];
	$strAcao = "I";
	if($idCategoria!=0)
	{
		$strSQL = "SELECT
						 NmCategoria
						, FgStatus
					FROM
						teCategoria
					WHERE
						idCategoria = '".mysql_real_escape_string($idCategoria)."' "; 
	
		$objRs = mysql_query($strSQL);
		$objRow = mysql_fetch_array($objRs);
		$strAcao = "E";
	}
?>
       <div id="page-wrapper">
            <h1>Cadastro de categoria</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
	                	<form class="form-horizontal" name="formCat" id="formCat" action="categorias.php" method="post">
							<div class="form-group">
								<div class="col-sm-6">
									<label for="NmCategoria">Categoria</label>
									<input type="hidden" name="acao" id="acao" value="<?php echo $strAcao; ?>" />
									<input class="form-control" id="NmCategoria" name="NmCategoria" placeholder="Nome Categoria" value="<?php echo $objRow['NmCategoria']; ?>"/>
								</div>
							</div><span id="erron"></span>
           					<div class="input-group">
								<label for="fltStatus">Status</label> <br />	
								<input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
								<?php 
									for ($i=0; $i < count($arrDados['fltStatus[$i]']); $i++) 
									{ 
										echo $arrDados['fltStatus[$i]'] == "A" ? " checked = 'hidden' " : "";
									}
								?>
								/> Ativo
								<input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
								<?php 
									for ($i=0; $i < count($arrDados['fltStatus[$i]']); $i++) 
									{ 
										echo $arrDados['fltStatus[$i]'] == "B" ? " checked = 'checked' " : "";
									}
								?>/> Bloqueado
	    					</div>
							<div class="form-group">
								<div class="col-sm-8">
									<button type="button" name="btnSalvar" id="btnSalvar" class="btn btn-success">Cadastrar</button>
			                		<a href="listCategoria.php">
			                			<button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>			                			
			                		</a>
								</div>
							</div>
						</form><script language="JavaScript">
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
								
								document.getElementById("formCat").submit();   
							};
							//};
						</script>
					<?php require_once("rodape.php"); ?>