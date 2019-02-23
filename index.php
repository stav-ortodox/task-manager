<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер задач</title>
	<link rel="stylesheet" href="style.css">

	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

	<!-- Дополнение к теме -->  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Последняя компиляция и сжатый JavaScript -->  
	<!-- <link type="text/javascript" href="js/bootstrap.min.js"> -->
</head>
<body>


<?php /* require_once "menu.php";*/?>
<?php require_once "action.php";?>




<div class="container">

	<!-- Кнопка вызова модального окна -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Открыть модальное окно
	</button>


	<!-- Модальное окно -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Заголовок модального окна</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	        		Содержимое модального окна
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-info">Любая кнопка</button>
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

	

	<div class="panel panel-default">
	  <!-- Содержание панели по умолчанию -->  
	  <div class="panel-heading">Менеджер задач</div>
	  <div class="panel-body">
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

	  			<? foreach ($tasks as $task) { ?>

	  			<tr>
	  				<td><?= $task['0'] ?></td>
	  				<td id="text"><?= $task['1'] ?></td>
	  				<td><?= $task['2'] ?></td>
	  				<td><?= $task['3'] ?></td>
	  			</tr>

					<? } ?>

	  		</tbody>
	  	</table>
	  </div>

	</div>
</div>

		

</body>
</html>
<?php /*require_once "footer.php";*/?>