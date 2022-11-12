<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Agosto/2022
---------------------------------------------------------------------------------->
<!-- MedAtualizar.php -->

<html>
	<head>
		<title>Clínica Médica ABC</title>
		<link rel="icon" type="image/png" href="imagens/favicon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/customize.css">
	</head>
<body onload="w3_show_nav('menuMedico')" >
	<!-- Inclui MENU.PHP  -->
	<?php require 'geral/menu.php'; ?>
	<?php require 'bd/conectaBD.php'; ?>

	<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">
		<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
			<p class="w3-large">
			<div class="w3-code cssHigh notranslate">
				<!-- Acesso em:-->
				<?php

				date_default_timezone_set("America/Sao_Paulo");
				$data = date("d/m/Y H:i:s", time());
				echo "<p class='w3-small' > ";
				echo "Acesso em: ";
				echo $data;
				echo "</p> "
				?>

				<!-- Acesso ao BD-->
				<?php		
				$id = $_GET['id'];

				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português	 
				mysqli_query($conn, "SET NAMES 'utf8'");
				mysqli_query($conn, 'SET character_set_connection=utf8');
				mysqli_query($conn, 'SET character_set_client=utf8');
				mysqli_query($conn, 'SET character_set_results=utf8');
				
				// Faz Select na Base de Dados
				$sql = "SELECT Matricula, Nome, Sobrenome, Descricao 
				FROM Funcionarios, Cargos 
				WHERE Matricula = $id AND 
				Cargos.Cargo_ID = Funcionarios.Fk_Cargo_ID";

				//Inicio DIV form
				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = mysqli_query($conn, $sql)) {
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						
						$matricula     = $row['Matricula'];
						$cargo 				 = $row['Descricao'];
						$nome          = $row['Nome'];
						$sobrenome           = $row['Sobrenome'];

						// Faz Select na Base de Dados
						$sqlG = "SELECT Cargo_ID, Descricao FROM Cargos";
							
						$optionsEspec = array();
						
						if ($result = mysqli_query($conn, $sqlG)) {
							while ($row = mysqli_fetch_assoc($result)) {
								$selected = "";
								if ($row['Cargo_ID'] == $cargo)
									$selected = "selected";
								array_push($optionsEspec, "\t\t\t<option " . $selected . " value='". $row["Cargo_ID"]."'>".$row["Descricao"]."</option>\n");
							}
						}

						?>
						<div class="w3-container w3-theme">
							<!-- <h2>Altere os dados do Médico Cód. = [<?php echo $matricula; ?>]</h2> -->
						</div>
						<form class="w3-container" action="funcionarioAtt_exe.php" method="post" enctype="multipart/form-data">
						<table class='w3-table-all'>
						<tr>
							<td style="width:50%;">
							<p>
							<label class="w3-text-IE"><b>Matricula</b></label>
							<input class="w3-input w3-border w3-light-grey " id="Matricula" name="Matricula" type="text"
									   value="<?php echo $matricula; ?>" required></p>
							<p>
							<label class="w3-text-IE"><b>Nome</b></label>
							<input class="w3-input w3-border w3-light-grey " id="Nome" name="Nome" type="text"
									   value="<?php echo $nome; ?>" required></p>
										 <p>
							<label class="w3-text-IE"><b>Sobrenome</b></label>
							<input class="w3-input w3-border w3-light-grey " id="Sobrenome" name="Sobrenome" type="text"
									   value="<?php echo $sobrenome; ?>" required>
										</p>
							<p>
							<p><label class="w3-text-IE"><b>Cargo</b>*</label>
							<select id="Cargo" name="Cargo" class="w3-input w3-border w3-light-grey " required>

							<?php
								foreach($optionsEspec as $key => $value){
									echo $value;
								}
							?>
							</select>
							</p>
						
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">
							<p>
							<input type="submit" value="Alterar" class="w3-btn w3-red" >
							<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='medListar.php'"></p>
						</tr>
						</table>
						<br>
						</form>
								<?php
					}else{?>
								<div class="w3-container w3-theme">
								<h2>Funcionario inexistente</h2>
								</div>
								<br>
							<?php
							}
				} else {
					echo "<p style='text-align:center'>Erro executando UPDATE: " . mysqli_error($conn) . "</p>";
				}
				echo "</div>"; //Fim form
				mysqli_close($conn);  //Encerra conexao com o BD
				?>
			</div>
			</p>
		</div>

	<?php require 'geral/sobre.php';?>
	<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE.PHP  -->
	<?php require 'geral/rodape.php';?>

</body>
</html>
