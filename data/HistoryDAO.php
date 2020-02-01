<?php
include '../inc/ConnectHistory.php';

include '../model/History.php';

class HistoryDAO extends ConnectHistory {
	protected static $cnx;

	private static function getConection(){
			self::$cnx = Connect::conn();
		
	}

	private static function disconnect(){
		self::$cnx = null;
	}

	public static function regHistory($history){
		$query = "INSERT INTO `history_access` (`id_history`, `ip`, `date_access`, `time_in`, `time_out`) VALUES (NULL, :ip, :date_access, :time_in, :time_out)";

		//Fase 1. Preparacion de la consulta parametrizada
		self::getConection();
	
		$result = self::$cnx->prepare($query);

		$ip = $history->getIp();
		$result->bindParam(":ip", $ip);

		$date_access = $history->getDate_access();
		$result->bindParam(":date_access", $date_access);

		$time_in = $history->getTime_in();
		$result->bindParam(":time_in", $time_in);		

		$time_out = $history->getTime_out();
		$result->bindParam(":time_out", $time_out);

		//Fase 2. Ejecutar consulta
		if($result->execute()){
			
			
			self::disconnect();
			
			return true;
		}
		return false;

	}

	public static function updateHistory($user){
		//Consultar ultimo acceso al sistema
		$query = "SELECT id_history, ip, date_access, time_in, time_out FROM `history_access` ORDER BY `id_history` DESC LIMIT 1";



		self::getConection();
	
		$result = self::$cnx->prepare($query);

		if($result->execute()){

		$data = $result->fetch();

		//echo $data['id_history'];

		$history = new History();

		$history->setId_history($data["id_history"]);
		$idHistory = $data["id_history"];

		$history->setIp($data["ip"]);
		$history->setDate_access($data["date_access"]);
		$history->setTime_in($data["time_in"]);
		$history->setTime_out($data["time_out"]);

		//echo "Id History: " . $idHistory;

		$update = "UPDATE `users` SET `id_history` = '$idHistory' WHERE `users`.`id_user` = :id_user";

		//echo $update;

		self::getConection();

		$resultUpdate = self::$cnx->prepare($update);

		//echo $update;

		$id_user = $user->getId_history();
		$resultUpdate->bindParam(":id_user", $id_user);

		//echo $id_user;
		$resultUpdate->execute();

		self::disconnect();
	return true;
	}

	return false;


	}//metodo updateHistory
}//Class History DAO