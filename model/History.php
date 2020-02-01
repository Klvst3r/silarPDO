<?php
/*
http://mikeangstadt.name/projects/getter-setter-gen/
 */

Class History {
	private $id_history;
	private $ip;
    private $date_access; 
    private $time_in;
    private $time_out;

    public function getId_history(){
		return $this->id_history;
	}

	public function setId_history($id_history){
		$this->id_history = $id_history;
	}

	public function getIp(){
		return $this->ip;
	}

	public function setIp($ip){
		$this->ip = $ip;
	}

	public function getDate_access(){
		return $this->data_access;
	}

	public function setDate_access($data_access){
		$this->data_access = $data_access;
	}

	public function getTime_in(){
		return $this->time_in;
	}

	public function setTime_in($time_in){
		$this->time_in = $time_in;
	}

	public function getTime_out(){
		return $this->time_out;
	}

	public function setTime_out($time_out){
		$this->time_out = $time_out;
	}  
}