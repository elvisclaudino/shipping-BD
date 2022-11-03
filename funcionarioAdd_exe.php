<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Agosto/2022
---------------------------------------------------------------------------------->
<!-- medIncluir_exe.php -->

<html>
	<head>
	  <title>SHIPPING</title>
	  <link rel="icon" type="image/png" href="imagens/favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body class="background" onload="w3_show_nav('menuMedico')">
<!-- Inclui MENU.PHP  -->
<?php require 'geral/menu.php';?>
<?php require 'bd/conectaBD.php'; ?>
<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-top:5px;">
<div>
  <div class="w3-code cssHigh notranslate w3-green w3-round-large">

	<!-- Acesso ao BD-->
	<?php
		$nome    = $_POST['Nome'];	
		$sobrenome     = $_POST['Sobrenome'];
		$cargo   = $_POST['Cargo'];
		
		// Cria conexão
		$conn = mysqli_connect($servername, $username, $password, $database);

		// Verifica conexão
		if (!$conn) {
			die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
		}
		// Configura para trabalhar com caracteres acentuados do português
		mysqli_query($conn,"SET NAMES 'utf8'");
		mysqli_query($conn,'SET character_set_connection=utf8');
		mysqli_query($conn,'SET character_set_client=utf8');
		mysqli_query($conn,'SET character_set_results=utf8');

		// Faz Select na Base de Dados para determinar o ID para o cargo
		$sqlG = "SELECT Cargo_ID FROM Cargos";
						
		$optionsCargo = array();
				
		if ($result = mysqli_query($conn, $sqlG)) {
			while ($row = mysqli_fetch_assoc($result)) {
			   array_push($optionsCargo, $row["Cargo_ID"]);
			}
		}

		// Faz Select na Base de Dados para calculo de um novo ID
		$sqlH = "SELECT MAX(Matricula) from Funcionarios";
			
		if ($result = mysqli_query($conn, $sqlH)) {
			while ($row = mysqli_fetch_assoc($result)) {
				$optionsId = $row["MAX(Matricula)"]+1;
			}
		}

		// Faz Insert na base de dados
		$sql = "INSERT INTO Funcionarios (Matricula, Nome, Sobrenome, Fk_Cargo_ID) VALUES ('$optionsId','$nome','$sobrenome','$optionsCargo[0]')";

		?>
		<div class="w3-center">
		<div>
		<h2>Inclusão de novo funcionário</h2>
		</div>
		<?php
		echo "<div>";
		if ($result = mysqli_query($conn, $sql)) {
			echo "<p>Registro cadastrado com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando INSERT: " . mysqli_error($conn . "</p>");
		}
        echo "</div>";
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
