<?php
	
	namespace app\clientes;
	use app\database\conexao;

	class clienteDAO{
		private $nome;
		private $email;
		private $telefone;

		//Getters and setters

		public function getNome(){
			return $this->nome;
		}

		public function setNome($name){
			$this->nome = $name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getFone(){
			return $this->telefone;
		}

		public function setFone($fone){
			$this->telefone = $fone;
		}

		public function insere(){
			$pdo = conexao::getConn();
			$stmt = $pdo->prepare("INSERT INTO clientes (nome, email, fone) VALUES (:nome, :email, :fone)");
			$stmt->execute([
				":nome" => $this->getNome(),
				":email" => $this->getEmail(),
				":fone" => $this->getFone()
			]);

			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}

		// Função que retorna os dados
		public function select(){
			$pdo = conexao::getConn();
			$stmt = $pdo->prepare("SELECT * FROM clientes");
			$stmt->execute();

			while($dados = $stmt->fetch(\PDO::FETCH_ASSOC)){
				echo '
					<tr>
						<td>'.$dados["id"].'</td>
						<td>'.$dados["nome"].'</td>
						<td>'.$dados["email"].'</td>
						<td>'.$dados["fone"].'</td>
						<td>
							<form method="post" accept-charset="utf-8">
								<input type="hidden" name="id" value="'.$dados["id"].'">
								<button type="submit" name="editar">EDITAR</button>
								<button type="submit" name="deletar">DELETAR</button>
							</form>
						</td>
					</tr>
				';
			}
			self::deleta_cliente();
			self::redirect_to();
		}

		// funcao que redireciona para a pagina de editar passando o paramentro id, necessario para fazer o load dos dados ja existentes para que o usuario possa vizualizar
		public function redirect_to(){
			if(isset($_POST["editar"])){
				$id = $_POST["id"];
				echo "<script> location.href = 'editar/{$id}'; </script>";
			}
		}

		// funcao que deleta um cliente do banco de dados
		public function deleta_cliente(){
			$pdo = conexao::getConn();

			if(isset($_POST["deletar"])){
				$id = $_POST["id"];

				$deleta = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
				$deleta->execute([":id" => $id]);

				if($deleta->rowCount() > 0){
					echo "<script> alert('Deletado com sucesso'); location.href = 'inicio'; </script>";
				}else{
					echo "<script> alert('Erro'); location.href = 'inicio'; </script>";
				}
			}
		}

		// funcao que editar um cliente
		public function edita_cliente($id){
			$pdo = conexao::getConn();

			$stmt = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, fone = :fone WHERE id = :id");
			$stmt->execute([
				":nome" => $this->getNome(),
				":email" => $this->getEmail(),
				":fone" => $this->getFone(),
				":id" => $id
			]);

			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}

		}

		// funcao que faz o load de acordo com o id que estiver na Get da url
		public function load_data($where){
			$pdo = conexao::getConn();

			$url = $_GET["pagina"];
			$explode = explode("/", $url);
			$count = count($explode);

			$id = $explode[1];

			$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
			$stmt->execute([":id" => $id]);

			$dados = $stmt->fetch(\PDO::FETCH_ASSOC);

			switch($where){
				case 'nome':
					echo $dados["nome"];	
				break;
				case 'email':
					echo $dados["email"];
				break;
				case 'fone':
					echo $dados["fone"];
				break;
				default:
					echo "valor invalido";
				break;
			}
		}
	}