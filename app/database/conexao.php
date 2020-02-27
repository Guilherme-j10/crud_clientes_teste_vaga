<?php
	
	namespace app\database;

	class conexao{

		// credencias de acesso a base de dados
		const host = "localhost";
		const senha = "";
		const user = "root";
		const dbname = "teste_vaga";

		public function getConn(){

			try {
				return $pdo = new \PDO("mysql:host=".self::host."; dbname=".self::dbname."; charset=utf8", self::user, self::senha);
			}catch(\PDOException $e) {
				echo $e->getMessage();
			}

		}

	}