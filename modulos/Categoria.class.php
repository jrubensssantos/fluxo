<?php  
	/**
	 * classe de categoria
	 */
	class Categoria 
	{
		private $idCategoria;
		private $NmCategoria;
		private $FgStatus;
		
		public function setCategoria($propriedade, $valor)
		{
			$this -> $propriedade = $valor;
		}
		
		public function getCategoria($valor)
		{
			return $this -> $valor;
		}
	}
	
	// $categoria = new Categoria();
// 	
	// $categoria -> setCategoria('idCategoria', 12);
	// $categoria -> setCategoria('NmCategoria', 'Joao');
	// $categoria -> setCategoria('FgStatus', 'A');
// 	
	// echo $categoria -> getCategoria('idCategoria')."<br />";
	// echo $categoria -> getCategoria('NmCategoria');		