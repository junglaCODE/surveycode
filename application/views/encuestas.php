<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pruebas mother fucker</title>
</head>
<body>

<div id="container">
	<?php foreach($formulario as $componente): ?>
		<label> <?= $componente->label?> </label><br>
		<?= $obj->switchComponents($componente->widget) ?> <br>
	<?php endforeach;?>
</div>
</body>
</html>