<?php

class Surveys extends CI_Model  {

	private $_table = null;
	private $pk_id ;
	protected $started;
	public  $fk_form;
	public $result;
	public  $provider;
	public $lead;

	public function __construct(){
		parent::__construct();
	}

	public function insert(){
	    echo "Aqui se inserto";
	}

	public function delete(){
        echo "Aqui se borro";
	}

	public function update(){
	    echo "Aqui se actualizo";
	}



}
?>
