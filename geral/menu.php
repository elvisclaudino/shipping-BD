<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Agosto/2022
---------------------------------------------------------------------------------->
<!-- menu.php -->

	<!-- Top -->
	<div> 
		<div class="w3-row w3-black" >
			<div class="w3-half w3-margin">
				<a class="logo" href="."><img src='imagens/Logo.png' alt='SHIPPING'></a>
			</div>
		</div>

	</div>

	<div class="w3-sidebar w3-bar-block w3-border-right w3-yellow w3-border-right w3-border-black" style="z-index:3;width:200px;display:none" id="mySidebar">
		<button onclick="w3_close()" class="w3-bar-item w3-large w3-black w3-monospace">Fechar &times;</button>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="entregasListar.php">Ínicio</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="funcionarios.php">Funcionários</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="cargas.php">Cargas</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="transportes.php">Transportes</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="destinos.php">Destinos</a>
	</div>

	<div class="w3-teal w3-yellow">
		<button class="w3-button w3-teal w3-large w3-yellow w3-hover-black" onclick="w3_open()">☰</button>
	</div>

	<!-- Sidebar -->
	<!-- <div class="w3-sidebar w3-bar-block w3-collapse w3-yellow " style="z-index:3;width:200px" id="mySidebar" >
		<button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="entregasListar.php">Home</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="funcionarios.php">Funcionários</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="cargas.php">Cargas</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="transportes.php">Transportes</a>
		<a class="w3-bar-item w3-button w3-hover-black w3-monospace" href="destinos.php">Destinos</a>
	</div> -->

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

	<script type="text/javascript" src="js/myScriptClinic.js"></script>