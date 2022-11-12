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
<body onload="w3_show_nav('menuMedico')" class="background">
<!-- Inclui MENU.PHP  -->
<?php require 'geral/menu.php';?>
<?php require 'bd/conectaBD.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container">
<div>
  <div class="w3-code cssHigh notranslate w3-yellow w3-round-large w3-center">
	<div>
	<h2>Exclusão de Funcionário</h2>
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

		$sql = "SELECT Matricula
		FROM funcionarios, entregas
		WHERE funcionarios.Matricula = entregas.Fk_Funcionario_ID AND
				funcionarios.Matricula = $id	
		";

		echo "<div>";
		if ($result = mysqli_query($conn, $sql)) {
			$row = mysqli_fetch_assoc($result);

			if ($row['Matricula']== $id) {
				echo "<p>&nbsp;Funcionário atrelado a uma entrega"."</p>"; // Precisa retirar o mysqlierror
			}else{
				// Faz DELETE na Base de Dados
				$sql = "DELETE FROM Funcionarios WHERE Matricula = $id";

				echo "<div>";
				if ($result = mysqli_query($conn, $sql)) {
					echo "<p>&nbsp;Registro excluído com sucesso! </p>";
				} else {
					echo "<p>&nbsp;Funcionário atrelado a uma entrega"."</p>"; // Precisa retirar o mysqlierror
				}
						echo "</div>";
			}
		} 
		mysqli_close($conn);  //Encerra conexao com o BD
		?>
  </div>
	</div>
	<footer class="w3-center">
		<p>
			<nav>
				<a class="w3-button w3-round-large w3-medium w3-yellow w3-hover-white w3-monospace" href="funcionarios.php">Ir para Funcionários</a>
			</nav>
		</p>
	</footer>
</body>
</html>