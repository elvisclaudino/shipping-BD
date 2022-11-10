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
    <link rel="icon" type="image/png" href="imagens/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/customize.css">
</head>
<body onload="w3_show_nav('menuMedico')" class="background">

<!-- Inclui MENU.PHP  -->
<?php require 'geral/menu.php';?>
<?php require 'bd/conectaBD.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-top:5px;">
    <div>
      <div class="w3-code cssHigh notranslate w3-yellow w3-round-large">
      <!-- Acesso ao BD-->
				<?php
	
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

				$Matricula=$_GET['id'];
				
				// Faz Select na Base de Dados
				$sql = "SELECT Matricula, Nome, Sobrenome, Descricao FROM Funcionarios 
                INNER JOIN Cargos ON ( Fk_Cargo_ID = Cargo_ID) WHERE Matricula = $Matricula;";

				//Inicio DIV form
				echo "<div>";  
          if ($result = mysqli_query($conn, $sql)) {
					if (mysqli_num_rows($result) == 1) {
						$row = mysqli_fetch_assoc($result);
					?>
                <div class="w3-container w3-theme">
                    <h2>Exclusão do Funcionario Cód. = [<?php echo $row['Matricula']; ?>]</h2>
                </div>
                <form class="w3-container" action="funcionarioRem_exe.php" method="post" onsubmit="return check(this.form)">
                    <input type="hidden" id="Id" name="Id" value="<?php echo $row['Matricula']; ?>">
                    <p>
                    <label class="w3-text-IE"><b>Nome: </b> <?php echo $row['Nome']; ?> </label></p>
                    <p>
                    <label class="w3-text-IE"><b>Sobrenome: </b> <?php echo $row['Sobrenome']; ?> </label></p>
                    <p>
                    <label class="w3-text-IE"><b>Cargo: </b> <?php echo $row['Descricao']; ?> </label></p>
                    <p>
                    <input type="submit" value="Confirma exclusão?" class="w3-button w3-round-large w3-medium w3-green w3-hover-white w3-monospace" >
                    <input type="button" value="Cancelar" class="w3-button w3-round-large w3-medium w3-red w3-hover-white w3-monospace" onclick="window.location.href='funcionarios.php'"></p>
                </form>
			<?php 
					}else{?>
						<div class="w3-container w3-theme">
						<h2>Tentativa de exclusão de Funcionario inexistente</h2>
						</div>
						<br>
					<?php }
				}else {
					
					echo "<p style='text-align:center'>O funcionário está atrelado a uma entrega ". "</p>";
				}
				echo "</div>"; //Fim form
				mysqli_close($conn);  //Encerra conexao com o BD

			?>

			</div>
		</p>
	</div>
</body>
</html>
