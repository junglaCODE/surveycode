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
    .when("/red", {
        templateUrl : "red.htm"
    })
});

function _formSurvey_($http) {
	var vm = this;
	
	this.finished = function(survey){
		$http.post('encuestas/saved',{
			result : survey
		})
        .then(function (request) {
			console.log(request);                           
        }, function (request) {
            console.log("Existe un problema de conexión");
        });
	}
}
