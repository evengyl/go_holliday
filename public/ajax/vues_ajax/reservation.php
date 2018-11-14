
<div class="checkbox col-lg-2" style="background:white; padding:5px;">
	<label>
		<input type="checkbox" style="padding:5px;" <?=(isset($_SESSION['active_all_todo']) && $_SESSION['active_all_todo'])?'checked':''; ?> data-action="active_all_todo" role="alert">Toujours tout Voir</button>	
	</label>
</div>	



<div class="checkbox col-lg-2" style="background:white; padding:5px;">
	<label>
		<input type="checkbox" style="padding:5px;" <?=(isset($_SESSION['active_all_todo']) && $_SESSION['active_all_todo'])?'checked':''; ?> data-action="active_all_todo" role="alert">Toujours tout Voir</button>	
	</label>
</div>	



<table id="table_list_todo" class="table table-stripped table-hover table-bordered table-responsibe" style="background:white;">
	<tr>
		<th style="width:5%;">N°</th>
		<th style="width:20%;">Titre</th>
		<th style="width:45%;">A faire</th>
		<th style="width:15%;">Date de création</th>
		<th style="width:15%;">Option</th>
	</tr><?
	if(!empty($list_todo))
	{
		foreach($list_todo as $row_todo)
		{?>
			<tr class="<?=($row_todo->visible == 1)?'success':'danger'; ?>">
				<td ><?= $row_todo->id; ?></td>
				<td contenteditable="true" data-action="edit" data-column="todo_title" data-id="<?= $row_todo->id ?>"><?= $row_todo->todo_title; ?></td>
				<td contenteditable="true" data-action="edit" data-column="todo_content" data-id="<?= $row_todo->id ?>"><?= $row_todo->todo_content; ?></td>
				<td contenteditable="true" data-action="edit" data-column="date" data-id="<?= $row_todo->id ?>"><?= $row_todo->date; ?></td>
				<td><?=($row_todo->visible == 1)?'<button data-id="'.$row_todo->id .'" data-action="suppression" class="btn btn-info">Valider comme Fait</button>':''; ?></td>
			</tr><?
		}
	}
	else
	{
		echo "<div class='col-lg-12 alert alert-danger' role='alert'>Il n'y plus rien à faire pour le moment à cette date ci</div>";
	}?>
</table>

<button class="col-lg-3 alert btn btn-info" style="padding:5px; cursor:pointer;" data-action="ajout">Ajouter une chose à faire</button>
<div class="col-lg-12 col-without-padding"><button class="col-lg-3 alert alert-warning" style="padding:5px;" data-action="view_all_todo_list" role="alert">Tout Voir</button></div>