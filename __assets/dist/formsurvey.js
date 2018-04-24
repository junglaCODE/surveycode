angular
.module('SurveyCode', [
	'ngRoute'
])
.controller('_formSurvey_',_formSurvey_)

function _formSurvey_($http) {
	
	this.finished = function(survey){
		console.log(survey);
	}
}
