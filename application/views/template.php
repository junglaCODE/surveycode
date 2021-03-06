<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="SurveyCode">
<head>
	<meta charset="utf-8">
	<title>SurveyCode | junglaCODE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="__assets/materialize/css/materialize.css">
<link rel="stylesheet" href="__assets/dist/css/_style.css">
</head>
<body ng-controller="_formSurvey_ as survey">
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">SurveyCode</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href=".">Encuesta</a></li>
        <li><a href="#!monitor">Monitoreo</a></li>
      </ul>
    </div>
  </nav>
	<div class="row">
		<div class="col s12 m8 offset-m2 card">
			<form ng-submit="survey.finished(survey.form)">
				<div ng-view></div>
			</form>
		</div>
	</div>
<script type="text/javascript" src="__assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="__assets/angular/angular.min.js"></script>
<script type="text/javascript" src="__assets/angular/angular-route.min.js"></script>
<script type="text/javascript" src="__assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="__assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="__assets/angular-chart/Chart.min.js"></script>
<script type="text/javascript" src="__assets/angular-chart/angular-chart.min.js"></script>
<script type="text/javascript" src="__assets/thirdparty/checklist-model.js"></script>
<script type="text/javascript" src="__assets/dist/js/formsurvey.js"></script>
</body>
</html>