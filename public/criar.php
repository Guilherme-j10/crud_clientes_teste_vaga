<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Crirar cliente</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
		<main>
			<header>
				<h1>Criar cliente</h1>
			</header>
			<form method="post" accept-charset="utf-8">
				<div class="line">
					<input type="text" name="nome" placeholder="Digite o nome" required="">
				</div>
				<div class="line">
					<input type="email" name="email" placeholder="Digite o email" required="">
				</div>
				<div class="line">
					<input type="text" name="fone" placeholder="Digite o telefone" required="">
				</div>
				<input type="submit" name="enviar" value="Criar">
			</form>
			<?php app\core::get_info(); ?>
		</main>
	</body>
</html>