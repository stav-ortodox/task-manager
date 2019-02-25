<?php 
require_once "config.php";

/** выполненная задача **/
if (isset($_POST['ok'])) {
	$ok = $_POST['hidden'];
	$query = ("SELECT conditions, task FROM tasks WHERE id = $ok");
	$res = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($res);
	$cond = $row['conditions'];
	$task = $row['task'];
	
	if ($cond == 1) {
		$cond = 0;
		$task = strip_tags($task);
		$query = ("UPDATE tasks SET conditions = '$cond', task = '$task' WHERE id = $ok");
		mysqli_query($connection, $query) or die (mysqli_error($connection));
		header('Location: index.php');
		exit();
	}
	if ($cond == 0) {
		$cond = 1;
		$task = '<s>'.$task.'</s>';
		$query = ("UPDATE tasks SET conditions = '$cond', task = '$task' WHERE id = $ok");
		mysqli_query($connection, $query) or die (mysqli_error($connection));
		header('Location: index.php');
		exit();
	}
}

// добавление задачи
if (isset($_POST['add'])) {
	$task = ucfirst_utf8(trim(mysqli_real_escape_string($connection, $_POST['input-task'])));
	$task = htmlentities($task);
	$query = "INSERT INTO tasks (task) VALUES ('$task')";
	mysqli_query($connection, $query) or die (mysqli_error($connection));
	header('Location: index.php');
	exit();
}

// редактирование задачи
if (isset($_POST['edit'])) { 
	$ok = $_POST['hidden'];
	$query = ("SELECT task, conditions FROM tasks WHERE id = $ok");
	$res = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($res);
	$task = strip_tags($row['task']);
	$query = "UPDATE `tasks` SET `conditions` = 0 WHERE `tasks`.`id` = $ok";
 	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));
	include "index.php"; ?>
	<script>$('#exampleModal2').modal('show');</script> <? 
}

// обновление редактированной задачи
if (isset($_POST['add_edit'])) {
	$uptask = $_POST['input-task'];
	$uptask = htmlentities(mysqli_real_escape_string($connection, $uptask));
	$ok = $_POST['id'];
 	$query = "UPDATE `tasks` SET `task` = '$uptask' WHERE `tasks`.`id` = $ok";
 	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection)); 
	unset($_POST['edit']);
	mysqli_close($connection);
	header('Location: index.php');
	exit(); 
}

// удаление задачи
if (isset($_POST['delete'])) {
	$id = $_POST['hidden'];
	$query ="DELETE FROM tasks WHERE id = '$id'";
	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
	mysqli_close($connection);
	header('Location: index.php');
	exit(); 
}

// очистить	таблицу
$clear = $_POST['clearT'];
 if (isset($clear)) {
	$query ="DELETE FROM tasks ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
	mysqli_close($connection);
	// $query ="TRUNCATE TABLE tasks";
	// $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
	// mysqli_close($connection);
	if(mysqli_query($connection, $query)){
    echo '<font color="green">Success</font>';
  }else{
    echo '<font color="red">Error</font>';
  }
	// exit(); 
 }




 if(isset($_POST['email']) && $_POST['email'] != ''){
   $email = $_POST['email'];
   $email = mysqli_real_escape_string($connection,$email);
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     echo 'invalid';
   }else{
     $sql = "SELECT id FROM email WHERE email='$email'";
     $result = mysqli_query($connection,$sql);
     if(mysqli_num_rows($result) == 1){
       echo 'invalid';
     }else{
       echo 'valid';
     }
   }
 }

 if(isset($_POST['add_email']) && $_POST['add_email'] != ''){
   $email = mysqli_real_escape_string($connection,$_POST['add_email']);
   $sql = "INSERT INTO email(email) VALUES('$email')";

   if(mysqli_query($connection,$sql)){
     echo '<font color="green">Success</font>';
   }else{
     echo '<font color="red">Error</font>';
   }
 }


 
// var_dump($task);
			// exit();

?>