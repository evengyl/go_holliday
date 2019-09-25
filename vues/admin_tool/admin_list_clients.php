 <div class="col-lg-12">
    <div class="col-lg-12 annonces_list text-center">
		<h3 class="thin">Liste des Clients</h3>
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
							<th>Options</th>
						</tr>
						</tr><?
						if($list_clients)
						{
							foreach($list_clients as $row_client)
							{?>
								<tr class="info">
									<td><?= $row_client->id; ?></td>
									<td><?= $row_client->name." ".$row_client->last_name ?></td>
									<td><?= $row_client->mail; ?></td>
									<td><?= $row_client->tel; ?></td>
									<td><?= $row_client->date_create; ?></td>
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

