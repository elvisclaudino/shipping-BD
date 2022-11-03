<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Agosto/2022
---------------------------------------------------------------------------------->
<!-- medExcluir.php -->

<html>
	<head>

	  <title>SHIPPING</title>
	  <link rel="icon" type="image/png" href="imagens/favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body onload="w3_show_nav('menuMedico')">
<!-- Inclui MENU.PHP  -->
<?php require 'geral/menu.php';?>
<?php require 'bd/conectaBD.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container">

<div class="w3-panel w3-padding-large w3-card-4 w3-pale-yellow">
  <p class="w3-large">
  <div class="w3-code cssHigh notranslate w3-yellow">
	<div class="w3-container w3-theme">
	<h2>Exclusão de Funcionario</h2>
	</div>

	<!-- Acesso ao BD-->
	<?php
				
		// Cria conexão
		$conn = mysqli_connect($servername, $username, $password, $database);

		// ID do registro a ser excluído
		$id = $_POST['Id'];

		// Verifica conexão
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Faz DELETE na Base de Dados
		$sql = "DELETE FROM Funcionarios WHERE Matricula = $id";

		echo "<div class='w3-responsive w3-card-4'>";
		if ($result = mysqli_query($conn, $sql)) {
			echo "<p>&nbsp;Registro excluído com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando DELETE: " . mysqli_error($conn . "</p>");
		}
        echo "</div>";
		mysqli_close($conn);  //Encerra conexao com o BD

		?>
  	</div>
	</div>
</body>
</html>
