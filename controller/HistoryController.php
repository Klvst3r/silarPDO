<?php
include '../data/HistoryDAO.php';

class HistoryController {
	public function regHistory($ip, $date, $time_in, $time_out){
		$obj_history = new History;

		$obj_history->setIp($ip);
		$obj_history->setDate_access($date);
		$obj_history->setTime_in($time_in);
		$obj_history->setTime_out($time_out);

		return HistoryDAO::regHistory($obj_history);

	}
	public function updateHistory($idUser){
		$obj_history = new History;

		$obj_history->setId_history($idUser);

		return HistoryDAO::updateHistory($obj_history);

	}

}
