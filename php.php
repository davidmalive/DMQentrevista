<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP</title>
	</head>
	<body>
		<div>
			<form name="formulario" method="post">
				<input type="text" name="lista" placeholder="Lista">
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>
	</body>
</html>

<?php
	// Compruebo si se han introducido datos en el campo de texto
	if (isset($_POST['lista']) && !empty($_POST['lista'])) {
		// Separao por comas los datos, limpio los espacios en blanco y creo un nuevo array solo con los números válidos
		$lista = explode(',', $_POST['lista']);
		$lista_valida = [];
		foreach ($lista as $valor) {
			$valor = trim($valor);
			if (is_numeric($valor)) {
				$lista_valida[] = $valor;
			}
		}

		// Pinto los datos del array en la lista
		if (isset($lista_valida) && !empty($lista_valida)) {
			echo "<ul>";
			foreach ($lista_valida as $numero) {
				echo "<li>". $numero ."</li>";
			}
			echo "</ul>";
		} else {
			echo "<span>Introduzca una lista de números separados por coma. Ej: 1,-2,3.3,4</span>";
		}
	} else {
		echo "<span>Introduzca una lista de números separados por coma. Ej: 1,-2,3.3,4</span>";
	}
?>