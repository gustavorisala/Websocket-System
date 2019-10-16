<?php

class db {

	//host
	//private $host = 'pcservercopy.ddns.net';
    private $host = 'localhost';

	//usuario
        private $usuario = 'mtbrasil';

	//senha
	private $senha = 'mt@brasil@01';
      

	//banco de dados
	private $database = 'copy';
        
        private $con;

	public function conecta_mysql(){

		//criar a conexao
		$this->con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($this->con, 'utf8');

		//verficar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();	
		}

		return $this->con;
	}
        
        public function fecharConexao(){
            mysqli_close($this->con);
        }

}



?>
