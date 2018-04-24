<?php

class Results extends CI_Model  {
	
	private $_table = null;
	private $pk_id ;
	protected $started;
	public  $fk_form;
	public $result;
	public  $provider;
	public $lead;

	public function __construct(){
		parent::__construct();
		$this->_table = strtolower(get_class($this));
	}
	
	public function getTodo(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	
	public function insert($results){
		$this->db->insert($this->_table,$results);	
	}
	
}
