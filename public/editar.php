<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar cliente</title>
		<!-- Bloco de código php, para verificar se tem algum parametro get na url e de acordo com os que for retornado inserir o diretorio correto da style -->
		<?php
			$url = $_GET["pagina"];
			$explode = explode("/", $url);
			$count = count($explode);

			if($count > 1){
				echo '<link rel="stylesheet" type="text/css" href="../style/style.css">';
			}else{
				echo '<link rel="stylesheet" type="text/css" href="style/style.css">';
			}
		?>
	</head>
	<body>
		<main>
			<header>
				<h1>Editar dados de cliente cliente</h1>
			</header>
			<form method="post" accept-charset="utf-8">
				<div class="line">
					<input type="text" name="nome" placeholder="Digite o nome" required value="<?php app\clientes\clienteDAO::load_data('nome'); ?>">
				</div>
				<div class="line">
					<input type="email" name="email" placeholder="Digite o email" required value="<?php app\clientes\clienteDAO::load_data('email'); ?>">
				</div>
				<div class="line">
					<input type="text" name="fone" placeholder="Digite o telefone" required value="<?php app\clientes\clienteDAO::load_data('fone'); ?>">
				</div>
				<input type="submit" name="editar" value="Atualizar dados">
			</form>
			<?php app\core::update_clientes(); ?>
		</main>
	</body>
</html>