<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller {

	const VERSION = '0.1.1';
	
    public function __construct(){		
   		parent::__construct();
		$this->load->model('Forms');	
		$this->load->model('Results');	
	}
	
	public function index(){			  
		$this->load->view('template',null);
	}
	
	public function loadSurvey(){
		$data['formulario'] = $this->Forms->getTodo();
		$data['obj'] = $this;
		$this->load->view('survey',$data);
	}
	
	public function finallySurvey(){
		$this->load->view('goodbye',null);
	}
	
	public function setComponent($metadatos){
		$answer = '';
		switch($metadatos->widget):
		case 'select':
			$answer = '<option value=\'\'> Elije alguna opción</option>';
			foreach(json_decode($metadatos->answer,true) as $key => $value):
				$answer.="<option value='{$key}'>{$value}</option>";
			endforeach;
			return "<div class='row answer'>
						<select ng-model='survey.form.results.{$metadatos->id}'>
							{$answer}
						</select>
						<label>{$metadatos->label}</label>
					</div>";
		default:
			foreach(json_decode($metadatos->answer,true) as $key => $value):
				$token = str_replace(' ','_',$value).'_'.$key;
				$answer.= "<li>
							<input type='{$metadatos->widget}' id='{$token}' name='{$metadatos->id}'
							ng-model='survey.form.results.{$metadatos->id}' value='{$key}'/>					
							<label for='{$token}'>{$value}</label>
						</li>";
			endforeach;
			return "<div class='row'>
						<label>{$metadatos->label}</label>
					</div><div class='row'></div>
					<div class='row answer'><ul class='lineal'>{$answer}</ul></div>";
		endswitch;
		
	}
	
	private function _associateFields($data){
		$this->Results->fk_form = 1;
		$this->Results->result = json_encode($data->results);
		$this->Results->provider = 'undefined';
		$this->Results->lead = json_encode($data->lead);
		return $this->Results;
	}
	
	public function saved(){
		$request =  file_get_contents("php://input");
		$data = json_decode($request)->_survey;
		$this->Results->insert(self::_associateFields($data));
	}
}
