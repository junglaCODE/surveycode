angular
.module('SurveyCode', [
	'ngRoute'
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
});

function _formSurvey_($http) {
	var vm = this;
	
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
}
