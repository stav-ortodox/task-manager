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
	<link rel="apple-touch-icon" sizes="57x57" href="/img/icons/favicon.iso">
	<link rel="stylesheet" href="style.css">
	<link rel="apple-touch-icon" sizes="57x57" href="/img/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/img/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/img/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/img/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/img/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/img/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/img/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/img/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>


<?php /* require_once "menu.php";*/?>
<?php require_once "config.php";?>




<div class="container">

	<div class="fav">
		<img src="img/icons/apple-icon-180x180.png" alt="">
	</div>

	<h1>Менеджер задач</h1>


	<!-- Кнопка вызова модального окна -->
	<button type="button" class="btnn btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Добавить задачу
	</button>

	<!-- Кнопка очищения таблицы-->
	<button type="submit" class="btnn btn btn-warning" id="clearT">
		Очистить лист
	</button>

	<!-- Кнопка очищения таблицы-->
	<button type="submit" class="btnn btn btn-danger" id="clearT" title="Удалить лист!">
		<i class="fa fa-trash" aria-hidden="true"></i>
	</button>


<?php 
if (!isset($_POST['edit'])) { ?>
<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<form action="action.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Добавление задачи</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" name="unset">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<textarea class="form-control" name="input-task" id="input-task" placeholder="Добавление задачи" cols="30" rows="10"><?= $task ?></textarea>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info" name="add">Добавить</button>
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
				</div>
			</form>
		</div>
	</div>
</div>
<? } ?>

<!-- ***************************************************************************************** -->

<?php 
if (isset($_POST['edit'])) { ?>
<!-- Модальное окно -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="action.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Редактирование задачи</h5>
				</div>
				<div class="modal-body">
					<textarea class="form-control" name="input-task" id="input-task" placeholder="Редакция задачи" cols="30" rows="10"><?= $task ?></textarea>
					<input type="hidden" name="id" value="<?= $ok ?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info" id="add_edit" name="add_edit">Добавить</button>
					<button type="submit" class="btn btn-secondary" id="unset" data-dismiss="modal">Закрыть</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>

			


	
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

		<tbody id="message">

		<?  //извлекаем все записи из таблицы
   	
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

			<? } } ?>

		</tbody>
	</table>


	 
</div>

<script>
	// <!-- редирект при нажатии закрыть в редактировании -->
	$('#unset').bind('click', function(){
 	window.location.href='index.php'
	});


// очистка листа
 $('#clearT').bind('click', function(){
 		var clearT = '1';
			if (confirm("Вы действительно хотите удалить весь лист задач?")) {
        $.ajax({
		 		  type: "POST",
		 		  url: "action.php",
		 		  data: {clearT: clearT},
		 		  success:function(msg){$('#message').html(msg)} 
			});
			} else {}
 		});
 	

</script>


</body>
</html>
