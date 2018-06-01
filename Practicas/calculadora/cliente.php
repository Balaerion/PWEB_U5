<H1>Calculadora 2.0</H1>
<form action="cliente.php" method="get">
  1er Valor: <input type="text" name="a"><br><br>
  2do Valor: <input type="text" name="b"><br><br>
  Operaci&oacute;n (suma • resta • multiplica • divide):
  <input type="text" name="op"><br><br>
  <input type="submit" value="Calcular">
</form>

<?php
if(isset($_GET["a"]) && !empty($_GET["a"]) && isset($_GET["b"]) && !empty($_GET["b"]) && isset($_GET["op"]) && !empty($_GET["op"])){
	require_once('lib/nusoap.php');
    $cliente = new nusoap_client('http://localhost/calculadora/servicio.php');
    $resultado = $cliente->call('calculadora',
    	array(	'x' => $_GET["a"],
    			'y' => $_GET["b"],
    			'operacion' => $_GET["op"]));
    echo $resultado;
  }
?>
