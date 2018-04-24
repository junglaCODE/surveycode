<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller {

	const VERSION = '0.1.0';
	
    public function __construct(){		
   		parent::__construct();
		$this->load->model('Forms');	
		$this->load->model('Results');	
	}
	
	public function index(){		
	    $data['formulario'] = $this->Forms->getTodo();
		$data['obj'] = $this;
		$this->load->view('encuestas',$data);
	}
	
	public function setComponent($metadatos){
		$answer = '';
		switch($metadatos->widget):
		case 'select':			
			foreach(json_decode($metadatos->answer,true) as $key => $value):
				$answer.="<option value='{$key}'>{$value}</option>";
			endforeach;
			return "<div class='row'>
					<select ng-model='survey.form.{$metadatos->id}'>
						{$answer}
					</select>
					<label>{$metadatos->label}</label>
					</div>";
		default:
			foreach(json_decode($metadatos->answer,true) as $key => $value):
				$token = str_replace(' ','_',$value).'_'.$key;
				$answer.= "<li>
							<input type='{$metadatos->widget}' id='{$token}' name='{$metadatos->id}'
							ng-model='survey.form.{$metadatos->id}' value='{$key}'/>					
							<label for='{$token}'>{$value}</label>
						</li>";
			endforeach;
			return "<div class='row'>
						<label>{$metadatos->label}</label>
					</div> 
					<div class='row'><ul style='display:inline-flex;'>{$answer}</ul></div>";
		endswitch;
		
	}
	
	private function _associateFields($data){
		$this->Results->fk_form = 1;
		$this->Results->result = json_encode($data->result);
		$this->Results->provider = $data->provider;
		$this->Results->lead = $data->lead;
		return $this->Results;
	}
	
	public function saved(){
		$request =  file_get_contents("php://input");		
		$data = json_decode($request);
		$data->provider = 'undefined';
		$data->lead = 'monolinux@smcmx.com.mx';
		$this->Results->insert(self::_associateFields($data));
	}
}
