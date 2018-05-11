<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class creacion extends CI_Controller {

	const VERSION = '0.1.2';

    public function __construct(){
   		parent::__construct();
		 $this->load->model('Surveys');
	}

	public function index(){
		$this->load->view('template',null);
	}
public function nuevaencuesta(){
	$this->Surveys->insert();
}

public function creatoken(){
  $_token = date('Hms').'_'.date('l').'_'.date('dmy').'_'.$_SERVER['SERVER_ADDR']; ;
	echo $_token;
}

}
