<?php require_once ('topo.php'); 
	
	if (isset($_GET['m'])) $modulo = $_GET['m'];
	if (isset($_GET['t'])) $tela = $_GET['t'];

?>
<div id="content" name="content">
	<?php 
		if ($modulo && $tela) {
			loadModulo($modulo, $tela);
		} 		
	?>
</div><!-- content -->
<?php 
	require_once 'menu.php';
 	require_once 'rodape.php';