<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller {

	const VERSION = '0.1.0';
	
    public function __construct(){		
   		parent::__construct();
		$this->load->model('Forms');	
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
							ng-model='survey.form.{$metadatos->id}' value='{$token}'/>					
							<label for='{$token}'>{$value}</label>
						</li>";
			endforeach;
			return "<div class='row'>
						<label>{$metadatos->label}</label>
					</div> 
					<div class='row'><ul style='display:inline-flex;'>{$answer}</ul></div>";
		endswitch;
		
	}
}
