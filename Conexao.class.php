<?php

/**
 * Classe responsavel por fazer a conexão com o banco de dados.
 * 
 * @author Julio Augusto
 * @version 1.0.0
 * @copyright Julio Augusto © 2018, www.julioaugusto.me
 * @example Classe Conexao();
*/ 

class Conexao {

	private $Host = 'localhost';	
   	private $User = 'root';
   	private $Pass = '';
   	private $Base = 'myhall';
   	
   	private static $Conexao;

   	public function efetuaConexao(){
		  try{
			   if (!isset(self::$Conexao)):
			       self::$Conexao = new PDO("mysql:host={$this->Host}; dbname={$this->Base}", $this->User, $this->Pass);
			   endif;
		  }
		  catch(PDOExcrption $e){
			  print 'Não foi possivel efetuar a conexão com a base de dados! <br />'. $e->getMessage();
		  }
		  
		  return self::$Conexao;
     }

}

