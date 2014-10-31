<?php  
	/**
	 * classe de Usuario
	 */
	class Usuario 
	{
		private $idUsuario;
		private $NmUsuario;
		private $NmLogin;
		private $DsEmail;
		private $DsSenha;
		private $FgAdmin;
		private $FgStatus;
		
		public function setUsuario($propriedade, $valor)
		{
			$this -> $propriedade = $valor;
		}
		
		public function getUsuario($valor)
		{
			return $this -> $valor;
		}
	}