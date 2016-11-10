
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <head>

<link href="http://localhost/fansmanager/public/css/estilos.css" rel="stylesheet" type="text/css">
<link href="http://localhost/fansmanager/public/css/main.css" rel="stylesheet" type="text/css">
    </head>
<div class="bg">
	<div class="centralizado">
		<!--
		<?php echo empty($mensagem) ? "" : "<p>$mensagem</p>" ?>
		-->
		<p class="font">
			<span style="
			    font-size: 28px;
			    letter-spacing: 1px;
			">Redefina sua <span class="textoAmarelo">senha</span>
			</span>
		</p>
		<p>Digite aqui seu email para receber o link de alteração de senha.</p>
		<form method="post" action="controle/esqueci-a-senha.php" id="loginForm">
			<p style="
			    margin-top: 25px;
			">
				<input type="text" name="email" placeholder="Seu Email" />
			</p>
			<input type="submit" value="Enviar" class="botaoBorda botaoAmarelo" />
		</form>

	</div>
</div>
</html>