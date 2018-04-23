<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SurveyCode | Casoba</title>
	<link rel="stylesheet" href="../__assets/materialize/css/materialize.css">
</head>
<body>
	<div class="row">
	<div class="col s12">
			<?php foreach($formulario as $componente): ?>
			<div class="row">
				<div class="input-field col s12">
				<label> <?= $componente->label?> </label>
				<?= $obj->switchComponents($componente->widget) ?>
				</div>
			</div>		
			<?php endforeach;?>		
	</div>
	</div>
<script type="text/javascript" src="../__assets/angular/angular.min.js"></script>
<script type="text/javascript" src="../__assets/angular/angular-route.min.js"></script>
<script type="text/javascript" src="../__assets/materialize/js/materialize.min.js"></script>
<script>
 $(document).ready(function() {
    $('select').material_select();
  });          
</script>
</body>
</html>