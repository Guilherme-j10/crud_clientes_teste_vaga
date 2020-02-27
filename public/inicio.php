<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
		<main>
			<header>
				<h1>Criar cliente</h1>
				<div class="new_user">
					<p>Cadastrar novo cliente: <a href="criar">Cadastrar</a> </p>
				</div>
			</header>
			<table>
				<tr>
					<th>ID</th>
					<th>NOME</th>
					<th>E-MAIL</th>
					<th>TELEFONE</th>
					<th>ACTION</th>
				</tr>
				<?php app\clientes\clienteDAO::select(); ?>
			</table>
		</main>
	</body>
</html>