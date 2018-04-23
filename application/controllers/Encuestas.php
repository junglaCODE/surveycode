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
	
	public function switchComponents($type){
		switch($type):
		case 'select':
			return '<select></select>';
		default:
			return "<input type='{$type}box'>";
		endswitch;
		
	}
}
