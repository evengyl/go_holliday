 <div class="col-lg-12">
    <div class="col-lg-12 annonces_list text-center">
		<h3 class="thin">Liste des Annonceurs</h3>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-without-padding col-without-radius">
					<table style="font-size:14px;" class="table table-striped table-bordered table-hover">
						<tr>
							<th>ID Utilisateurs</th>
							<th>Nom prénom</th>
							<th>Email</th>
							<th>Tel</th>
							<th>Date d'arrivée</th>
							<th>Nb d'annonces</th>
							<th>Nb de vues</th>
							<th>Options</th>
						</tr>
						</tr><?
						if($list_annonceurs)
						{
							foreach($list_annonceurs as $row_annonceurs)
							{?>
								<tr class="info">
									<td><?= $row_annonceurs->id; ?></td>
									<td><?= $row_annonceurs->name." ".$row_annonceurs->last_name ?></td>
									<td><?= $row_annonceurs->mail; ?></td>
									<td><?= $row_annonceurs->tel; ?></td>
									<td><?= $row_annonceurs->date_create; ?></td>
									<td><?= $row_annonceurs->nb_annonces; ?></td>
									<td><?= $row_annonceurs->vues; ?></td>
									<td>
										<a class="btn btn-info btn-sm" href="/Recherche/Validation/Annonces/<?= $row_client->id_announce; ?>">Contacter</a>
									</td>
								</tr><?
							}
						}?>
					</table>
				</div>
			</div>
		</div>    		
	</div>
</div>

