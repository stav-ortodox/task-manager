<?php 
// var_dump($task);
	




function get_string() {
	global $tasks;
	global $date;
	array_push($tasks, "2", "raspberry", $date, "raspberry");
	// echo '<pre>';
	// print_r($tasks);
	return $tasks;


	// array(1, "сделать то-то", date('d.m.Y'), 'checked'),

	
	// 
 
}

$num = 1;
$summ = $num;

$tasks = array(
		array($num++, "сделать то-то", $date, 'checked'),
  array($num++, "сделать то-то", $date, 'checked'),
  array($num++, "сделать то-то", $date, 'checked'),
  array($num++, "сделать то-то", $date, 'checked')
);

?>