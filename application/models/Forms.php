<?php

class Forms extends CI_Model  {
	
	private $_table = null;
	private	$pk_id  = null;
	public $id_internal;
	public $id_label;
	public $label;
	public $id_widget;
	public $widget;
	public $answer;
	protected $fk_survey; 
		
	public function __construct(){
		parent::__construct();
		$this->_table = strtolower(get_class($this));
	}
	
	public function getTodo(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}
			  
	
}
/*fin de la clase*/