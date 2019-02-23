<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер задач</title>
	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

	<!-- Дополнение к теме -->  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">

	<!-- Последняя компиляция и сжатый JavaScript -->  
	<!-- <link type="text/javascript" href="js/bootstrap.min.js"> -->
</head>
<body>


<?php /* require_once "menu.php";*/?>
<?php require_once "config.php";?>




<div class="container">

	<!-- Кнопка вызова модального окна -->
	<button type="button" class="btnn btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Добавить задачу
	</button>


	<!-- Модальное окно -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Добавление новой задачи</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<form action="action.php" method="post">
		      		<div class="modal-body">
	      				
	        		<input class="form-control" name="input-task"	type="text" placeholder="Новая задача">
	        		
		      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-info" name="btn-info">Добавить</button>
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
	      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div>

	

	
	  	<table class="cinereousTable table">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>Задача</th>
	  				<th>Дата</th>
	  				<th>Выполнение</th>
	  			</tr>
	  		</thead>
	  		<tfoot>
	  			<tr>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  			</tr>
	  		</tfoot>

	  		<tbody>
						<!-- <?php require_once "array.php";?> -->
	  			 <?  //извлекаем все записи из таблицы
       $query2 = mysqli_query($connection, "SELECT * FROM `tasks` ORDER BY `id`");
       	$num = 1;
       while($row = $query2->fetch_assoc()) { 
       	
       	// $num++;
       ?>
	  			<tr>
	  				<td><?= $num++; ?></td>
	  				<td id="text"><?= $row['task'] ?></td>
	  				<td><?= $row['date'] ?></td>
	  				<td>
	  					<form action="action.php" method="post">
	  						<button class="btn btn-success" type="submit" name="ok"><i class="fa fa-check" aria-hidden="true"></i></button>
	  						<button class="btn btn-info" type="submit" name="edit<?= $row['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
	  						<button class="btn btn-danger" type="submit" name="delete<?= $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
	  						<input type="hidden" name="hidden"	value="<?= $row['id'] ?>">	
	  					</form>
	  				</td>
	  			</tr>

					<? } ?>

	  		</tbody>
	  	</table>
	 
</div>

		

</body>
</html>
<?php /*require_once "footer.php";*/

// $array = array();


// $array[] = "item";
// $array[$key] = "item";
// array_push($array, "item", "another item", "ещё что-то");


?>