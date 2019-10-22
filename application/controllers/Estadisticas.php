<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {

	const VERSION = '0.1.0';
	
    public function __construct(){		
   		parent::__construct();
		$this->load->model('Results');	
		$this->load->model('Forms');
	}
	
	public function index(){			  
		$this->load->view('template',null);
	}
	
	public function totalSurveys(){
		$fetch = $this->Results->getTotal();
		$data['total'] = (int)$fetch[0]->total;
		$this->load->view('indicators',$data);
	}
	

	public function statisticsPerDay(){
		$_graphic = array();	
		foreach($this->Results->getTotalPerDay() as $values ):
			$_graphic['labels'][] = $this->Results->getInfoAnswerJson($values->day);
			$_graphic['data'][] = (int) $values->total;
		endforeach;
		echo json_encode($_graphic);
	}
		
}
