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
	
	
	public function ourLeads(){		
		$_leads = array();
		foreach( $this->Results->getInfoColumns('lead') as $key => $value):
			if(!empty($value->lead) && !is_null($value->lead))
				$_leads[] = json_decode($value->lead,TRUE);
		endforeach;
		var_dump($_leads);
	}

	public function ourTrends($point = 'sexo'){
		$_graphic = array();
		$_trend = array();
		foreach($this->Results->getInfoColumns('result') as $values):
			$cols = json_decode($values->result,TRUE); 
			$_trend[] = $cols[$point];
		endforeach;
		@$where->field = 'id';
		@$where->value = $point;
		$_labels = $this->Forms->getInfoColumns('answer',$where);
		$_labels = json_decode($_labels[0]->answer,TRUE);
		foreach(array_count_values($_trend) as $key => $value):
			$_graphic['labels'][] = $_labels[$key];
			$_graphic['data'][] = $value; 
		endforeach;
		echo json_encode($_graphic);
	}

	public function ourcompetitors($point = 'marca'){
		$_graphic = array();
		$_trend = array();
		foreach($this->Results->getInfoColumns('result') as $values):
			$cols = json_decode($values->result,TRUE); 
			$_trend[] = $cols[$point];
		endforeach;
		@$where->field = 'id';
		@$where->value = $point;
		$_labels = $this->Forms->getInfoColumns('answer',$where);
		$_labels = json_decode($_labels[0]->answer,TRUE);
		foreach(array_count_values($_trend) as $key => $value):
			$_graphic['labels'][] = $_labels[$key];
			$_graphic['data'][] = $value; 
		endforeach;
		echo json_encode($_graphic);
	}

	public function statisticsPerDay(){
		$_graphic = array();		
		foreach($this->Results->getTotalPerDay() as $values ):
			$_graphic['labels'][] = $values->day;
			$_graphic['data'][] = (int) $values->total;
		endforeach;
		echo json_encode($_graphic);
	}
		
}
