<?php  
	/**
	 * classe de Usuario
	 */
	class Movimento 
	{
		private $idMovimento;
		private $DtMovimento;
		private $Dsmovimento;
		private $NuValor;
		private $FgStatus;
		private $FgTipo;
		//$objUsuario Usuario();
		//$objCategoria Categoria();
		
		public function setCategoria($propriedade, $valor)
		{
			$this -> $propriedade = $valor;
		}
		
		public function getCategoria($valor)
		{
			return $this -> $valor;
		}
	}