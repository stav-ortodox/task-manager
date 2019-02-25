
<body>
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
	      				
	        		<input class="form-control" name="input-task"	type="text" value="<?= $task ?>" placeholder="Новая задача">
	        		
		      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-info" name="add">Добавить</button>
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
	      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div> 
	</body>