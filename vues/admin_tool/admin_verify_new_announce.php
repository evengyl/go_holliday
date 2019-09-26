 <div class="col-lg-12">
    <div class="col-lg-12 annonces_list text-center">
		<h3 class="thin">Liste des annonces en attente de validation administrative</h3>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-without-padding col-without-radius">
					<table style="font-size:14px;" class="table table-striped table-bordered table-hover">
						<tr>
							<th>ID Announce</th>
							<th>Utilisateurs</th>
							<th>Utilisateurs ID</th>
							<th>Titre</th>
							<th>Sous Titre</th>
							<th>Option</th>
						</tr><?
						if($list_announce_not_validate_by_admin)
						{
							foreach($list_announce_not_validate_by_admin as $announce_not_validate_by_admin)
							{?>
								<tr class="warning">
									<td><?= $announce_not_validate_by_admin->id; ?></td>
									<td><?= $announce_not_validate_by_admin->user_name." ".$announce_not_validate_by_admin->user_last_name ?></td>
									<td><?= $announce_not_validate_by_admin->id_user; ?></td>
									<td><?= $announce_not_validate_by_admin->title; ?></td>
									<td><?= $announce_not_validate_by_admin->sub_title; ?></td>
									<td><a class="btn btn-info btn-sm" href="/Annonces/<?= $announce_not_validate_by_admin->id; ?>">Voir</a></td>
								</tr><?
							}
						}?>
					</table>
				</div>
			</div>
		</div>    		
	</div>
</div>

