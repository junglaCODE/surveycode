<?php

class Forms extends CI_Model  {
	
	private $_table = null;
	private	$pk_id;
	public  $id_internal;
	public  $id_label;
	public  $label;
	public  $id_widget;
	public  $widget;
	public  $answer;
	public  $fk_survey; 
		
	public function __construct(){
		parent::__construct();
		$this->_table = strtolower(get_class($this));
	}
	
	public function getTodo(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}
			  
	public function getInfoColumns($col,$where){
		$this->db->select($col);
		$this->db->from($this->_table);	
		$this->db->where($where->field, $where->value);		
		$query = $this->db->get();
		return $query->result();
	}
}
/*fin de la clase*/