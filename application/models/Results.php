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
	
	public function getTotal(){
		$this->db->select('count(pk_id) AS total');
		$this->db->from($this->_table);				
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getInfoColumns($col){
		$this->db->select($col);
		$this->db->from($this->_table);				
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getInfoAnswerJson($key){
		$this->db->select("JSON_EXTRACT(answer,'$.{$key}') as opcion");
		$this->db->from('forms');
		$query = $this->db->get();
		$data = $query->result();	
		return $data[0]->opcion;
	}
	public function getTotalPerDay(){
		$this->db->select("JSON_EXTRACT(result,'$.mascota') AS day ,count(pk_id) AS total");
		$this->db->from($this->_table);
		$this->db->group_by('result');
		$query = $this->db->get();
		return $query->result();
	}
}
