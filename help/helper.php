<?php
/*
This script validate fields from forms to send by method POST
This make an clean spaces and avoid insertion of SQL code or JS defined in an action
in the moment of receive a value wirted from the form

 */

function validate_field($field){
	$field = trim($field);
	$field = stripcslashes($field);
	$field = htmlspecialchars($field);

	return $field;
}