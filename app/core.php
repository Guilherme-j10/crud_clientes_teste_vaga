<?php
	
	namespace app;
	use app\database\conexao;
	use app\clientes\clienteDAO;

	class core{

		//URL AMIGAVEL
		public function url_amigavel(){
			$url = (isset($_GET["pagina"])) ? $_GET["pagina"] : "inicio";
			$explode = explode("/", $url);
			$base_dir = "public/";
			$ext = ".php";

			if(file_exists($base_dir.$explode[0].$ext)){
				include($base_dir.$explode[0].$ext);
			}else{
				echo "Esta pagina nao existe";
			}
		}

		//recebe as informações e enviar para o banco
		public function get_info(){
			if(isset($_POST["enviar"])){
				$nome = strip_tags(addslashes($_POST["nome"]));
				$email = strip_tags(addslashes($_POST["email"]));
				$fone = strip_tags(addslashes($_POST["fone"]));
				
				$insert_info = new clienteDAO();
				$insert_info->setNome($nome);
				$insert_info->setEmail($email);
				$insert_info->setFone($fone);

				$inseret_data = $insert_info->insere();

				if($inseret_data == true){
					echo "<script> alert('cadastrado com sucesso'); location.href = 'inicio'; </script>";
				}else{
					echo "<script> alert('Erro'); location.href = 'inicio'; </script>";
				}
			}
		}

		// realiza a atualização das informações para o banco de dados
		public function update_clientes(){
			$url = $_GET["pagina"];
			$explode = explode("/", $url);
			$count = count($explode);

			$id = $explode[1];

			if(isset($_POST["editar"])){
				$nome = strip_tags(addslashes($_POST["nome"]));
				$email = strip_tags(addslashes($_POST["email"]));
				$fone = strip_tags(addslashes($_POST["fone"]));
				
				$update_cliente = new clienteDAO();
				$update_cliente->setNome($nome);
				$update_cliente->setEmail($email);
				$update_cliente->setFone($fone);

				$execute_update = $update_cliente->edita_cliente($id);

				if($execute_update == true){
					echo "<script> alert('Atualizado com sucesso'); location.href = '../inicio'; </script>";
				}else{
					echo "<script> alert('Erro'); location.href = '../inicio'; </script>";
				}
			}
		}
	}