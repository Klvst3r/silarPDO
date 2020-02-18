<?php
/*
Un generador de getter y setters de PHP lo utilizaremos con:
http://mikeangstadt.name/projects/getter-setter-gen/
Para generar y establecer el modelo de La BD
*/
Class User {
	private $id_user;
	private $id_priv;
	private $privelege;

	private $id_status_user;
	private $desc_status_user;

	private $id_history;
	private $name;
	private $user_name; 
	private $user_pass;
	private $user_tel;
	private $user_email;
	private $user_position;
	private $online;

	public function getId_user(){
		return $this->id_user;
	}

	public function setId_user($id_user){
		$this->id_user = $id_user;
	}

	public function getId_priv(){
		return $this->id_priv;
	}

	public function setId_priv($id_priv){
		$this->id_priv = $id_priv;
	}

	public function getPrivelege(){
		return $this->privelege;
	}

	public function setPrivelege($privelege){
		$this->privelege = $privelege;
	}

	public function getId_status_user(){
		return $this->id_status_user;
	}

	public function setId_status_user($id_status_user){
		$this->id_status_user = $id_status_user;
	}

	public function getDesc_status_user(){
		return $this->desc_status_user;
	}

	public function setDesc_status_user($desc_status_user){
		$this->desc_status_user = $desc_status_user;
	}

	public function getId_history(){
		return $this->id_history;
	}

	public function setId_history($id_history){
		$this->id_history = $id_history;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getUser_name(){
		return $this->user_name;
	}

	public function setUser_name($user_name){
		$this->user_name = $user_name;
	}

	public function getUser_pass(){
		return $this->user_pass;
	}

	public function setUser_pass($user_pass){
		$this->user_pass = md5($user_pass);
	}

	public function getUser_tel(){
		return $this->user_tel;
	}

	public function setUser_tel($user_tel){
		$this->user_tel = $user_tel;
	}

	public function getUser_email(){
		return $this->user_email;
	}

	public function setUser_email($user_email){
		$this->user_email = $user_email;
	}

	public function getUser_position(){
		return $this->user_position;
	}

	public function setUser_position($user_position){
		$this->user_position = $user_position;
	}

	public function getOnline(){
		return $this->online;
	}

	public function setOnline($online){
		$this->online = $online;
	}
}//Class User