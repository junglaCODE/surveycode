angular
.module('SurveyCode', [
	'ngRoute'
])
.controller('_formSurvey_',_formSurvey_)

function _formSurvey_($http) {
	var vm = this;
	
	this.finished = function(survey){
		console.log(survey);
	}
}
