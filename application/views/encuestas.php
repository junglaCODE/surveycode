<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="SurveyCode">
<head>
	<meta charset="utf-8">
	<title>SurveyCode | Casoba</title>
	<link rel="stylesheet" href="../__assets/materialize/css/materialize.css">
</head>
<body ng-controller="_formSurvey_ as survey">
	<div class="row">
	<div class="col s6 offset-s3 card">
	<form ng-submit="survey.finished(survey.form)">
			<?php foreach($formulario as $elemento): ?>
			<div class="row">
				<div class="input-field col s12">			
				<?= $obj->setComponent($elemento)?>
				</div>
			</div>		
			<?php endforeach;?>		
			<div class="row">
				<div class="input-field col s12">	
				<button type="submit" class="waves-effect waves-light btn-large col s12">Listo.</button>
				</div>
			</div>
	</form>
	</div>
	</div>
<script type="text/javascript" src="../__assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../__assets/angular/angular.min.js"></script>
<script type="text/javascript" src="../__assets/angular/angular-route.min.js"></script>
<script type="text/javascript" src="../__assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="../__assets/libs/checklist-model.js"></script>
<script type="text/javascript" src="../__assets/dist/formsurvey.js"></script>
<script>
 $(document).ready(function() {
    $('select').material_select();
  });          
</script>
</body>
</html>