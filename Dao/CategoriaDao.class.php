<?php 
	class CategoriaDao
	{
		private $objCategoria;
		private static $strTabela = "teCategoria";
		public $arrColunas = array (	
										"idCategoria"								
										, "NmCategoria"
										, "FgStatus"
									);
		function update()
		{
			$update = array();
			foreach($this -> arrColunas as $valor)
			{
				$updates[$valor] = mysql_real_escape_string($objCategoria -> {$valor});
			}
			
			$strSQL = 	"UPDATE {$this -> strTabela} SET"
							.implode(",", $update).""			
						. " WHERE idCategoria = ". $objCategoria -> idCategoria."";
			
			$strSQL = 	"INSET INTO {$this -> strTabela} "
							.implode(",", $update).""			
						. " WHERE idCategoria = ". $objCategoria -> idCategoria."";
						
			$strSQL = 	"DELETE FROM {$this -> strTabela} "
							.implode(",", $update).""			
						. " WHERE idCategoria = ". $objCategoria -> idCategoria."";
		}									
	}
