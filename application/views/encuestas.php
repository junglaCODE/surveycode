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
	<div class="col s8 offset-s2">
			<?php foreach($formulario as $componente): ?>
			<div class="row">
				<div class="input-field col s12">			
				<?= $obj->switchComponents($componente)?>
				</div>
			</div>		
			<?php endforeach;?>		
	</div>
	</div>
<script type="text/javascript" src="../__assets/jquery/jquery.min.js"></script>
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