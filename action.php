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
	$query ="DELETE FROM tasks ORDER BY id";
	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
	// mysqli_close($connection);
    $query = mysqli_query($connection, "SELECT * FROM `tasks` ORDER BY `id`");
           	$num = 1;
           	if (isset($query)  ) {
           		while($row = $query->fetch_assoc()) { ?>

        			<tr>
        				<td><h6><?= $num++; ?></h6></td>
        				<td id="text"><h6><?= $row['task'] ?></p></td>
        				<td><h6><?= $row['date'] ?></h6></td>
        				<td>
        					<form action="action.php" method="post">
        						<button class="btn btn-success" type="submit" name="ok" title="сторка <?= $num-1; ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
        						<button class="btn btn-info" type="submit" name="edit" title="сторка <?= $num-1; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        						<button class="btn btn-danger" type="submit" name="delete" title="сторка <?= $num-1; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
        						<input type="hidden" name="hidden" value="<?= $row['id'] ?>">
        					</form>
        				</td>
        			</tr>
        		<?}
        	}
      	}
     
    




 // if(isset($_POST['email']) && $_POST['email'] != ''){
 //   $email = $_POST['email'];
 //   $email = mysqli_real_escape_string($connection,$email);
 //   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 //     echo 'invalid';
 //   }else{
 //     $sql = "SELECT id FROM email WHERE email='$email'";
 //     $result = mysqli_query($connection,$sql);
 //     if(mysqli_num_rows($result) == 1){
 //       echo 'invalid';
 //     }else{
 //       echo 'valid';
 //     }
 //   }
 // }

 // if(isset($_POST['add_email']) && $_POST['add_email'] != ''){
 //   $email = mysqli_real_escape_string($connection,$_POST['add_email']);
 //   $sql = "INSERT INTO email(email) VALUES('$email')";

 //   if(mysqli_query($connection,$sql)){
 //     echo '<font color="green">Success</font>';
 //   }else{
 //     echo '<font color="red">Error</font>';
 //   }
 // }


 
// var_dump($task);
			// exit();

