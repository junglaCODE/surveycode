angular
.module('SurveyCode', [
	'ngRoute',
	'chart.js'
])
.controller('_formSurvey_',_formSurvey_)
.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "index.php/encuestas/loadSurvey"
    })
    .when("/gracias", {
        templateUrl : "index.php/encuestas/finallySurvey"
	})
	.when("/monitor",{
		templateUrl : "index.php/estadisticas/totalsurveys"
	})
});

function _formSurvey_($http) {
	var vm = this;
	var grpDay = null; 
	var grpTed = null;
	var grpCpt = null;

	this.finished = function(survey){
		$http.post('encuestas/saved',{
			_survey : survey
		})
        .then(function (request) {
			console.log(request,'Transporting dataform to db');   
			_reset(survey);
        }, function (request) {
            console.log("Existe un problema de conexión");
        });
	}
	
	function _reset(form){
		vm.form = null;
		console.log('Thank You, Finished survey satisfactorily. surveyCODE')
		location.href = "#!"; 
	}

	this.loadGraphicDays = function(){
		$http.post('estadisticas/statisticsPerDay',{
		})
        .then(function (request) {
			console.log(request,'loading graph of surveys made');   
			vm.grpDay = request.data;
        }, function (request) {
            console.log("Existe un problema de conexión");
        });
	}

	this.loadGraphicTrends = function(){
		$http.post('estadisticas/ourTrends',{
		})
        .then(function (request) {
			console.log(request,'loading graph of surveys made');   
			vm.grpTed = request.data;
        }, function (request) {
            console.log("Existe un problema de conexión");
        });
	}

	this.loadGraphicCompetitors = function(){
		$http.post('estadisticas/ourcompetitors',{
		})
        .then(function (request) {
			console.log(request,'loading graph of surveys made');   
			vm.grpCpt = request.data;
        }, function (request) {
            console.log("Existe un problema de conexión");
        });
	}

	this.loadGraphicDays();
	this.loadGraphicTrends();
	this.loadGraphicCompetitors();


}
