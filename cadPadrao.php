<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Tabs - Default functionality</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
<body>
 
<div id="tabs">
  <ul>
    <li><a href="#tbCadastrar">Cadastrar</a></li>
    <li><a href="#tbListar">Listar</a></li>
    <li><a href="#tbEditar">Editar</a></li>
	<li><a href="#tbExcluir">Excluir</a></li>
  </ul>
  <div id="tbCadastrar">
	<h1>Cadastro de categoria</h1>
	<form name="frmCadastro" id="frmCadastro" method="post" action="">
		<label for="NmCategoria">Categoria</label><br />
		<input type="txt" id="NmCategoria" name="NmCategoria" maxlength="100" /><br />
		<label for="FgStatus">Status</label><br />
		<select name="FgStatus" id="FgStatus">
			<option>Selecione o status</option>
			<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
			<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
		</select>
	</form>	
  </div>
  <div id="tbListar">
    <h1>Categorias cadastradas</h1>
	<form name="frmCadastro" id="frmCadastro" method="post" action="">
		<label for="NmCategoria">Categoria</label><br />
		<input type="txt" id="NmCategoria" name="NmCategoria" maxlength="100" /><br />
		<label for="FgStatus">Status</label><br />
		<select name="FgStatus" id="FgStatus">
			<option>Selecione o status</option>
			<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
			<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
		</select>
	</form>
  </div>
  <div id="tbEditar">
    <h1>Edição de categoria</h1>
	<form name="frmCadastro" id="frmCadastro" method="post" action="">
		<label for="NmCategoria">Categoria</label><br />
		<input type="txt" id="NmCategoria" name="NmCategoria" maxlength="100" /><br />
		<label for="FgStatus">Status</label><br />
		<select name="FgStatus" id="FgStatus">
			<option>Selecione o status</option>
			<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
			<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
		</select>
	</form>
  </div>
  <div id="tbExcluir">
    <h1>Exclusão de categoria</h1>
	<form name="frmCadastro" id="frmCadastro" method="post" action="">
		<label for="NmCategoria">Categoria</label><br />
		<input type="txt" id="NmCategoria" name="NmCategoria" maxlength="100" /><br />
		<label for="FgStatus">Status</label><br />
		<select name="FgStatus" id="FgStatus">
			<option>Selecione o status</option>
			<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
			<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
		</select>
	</form>
  </div>
</div>
 
 
</body>
</html>