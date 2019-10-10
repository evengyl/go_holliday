 <div class="col-xs-10">
    <div class="col-lg-12 annonces_list text-center">
		<h3 class="thin">Liste des Clients</h3>
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
								<a data-toggle="modal" style="padding:3px 15px;" data-target="#Mesage_to_client_<?= $row_client->id; ?>" class="btn btn-info btn-xs">Contacter</a>
								<a style="padding:3px 15px;" href="/admin/client_list/<?= $row_client->login_user_app; ?>" class="btn btn-warning btn-xs">Voir le profil</a>
							</td>

							<div class="modal fade" id="Mesage_to_client_<?= $row_client->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							    <div class="modal-dialog modal-lg" role="document">
							        <div class="modal-content">
							            <div class="modal-header">
							                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							                <h4 class="modal-title">Enoyer un mail à <?= $row_client->name." ".$row_client->last_name ?></h4>
							            </div>
							            <div class="modal-body">
							            	<form action="#" method="post">
							            		<input type="hidden" name="send_message_client">
							            		<input type="hidden" name="email_client" value="<?= $row_client->mail; ?>">
							            		<input type="hidden" name="name_client" value="<?= $row_client->name." ".$row_client->last_name ?>">
							                    <textarea rows="3" name="message" class="form-control" placeholder=""></textarea>
							                    <button style="margin-top:15px;" class="btn btn-info" type="submit" role="button">
							                        Envoyer
							                    </button>
						                    </form>
							            </div>
							        </div>
							    </div>
							</div>
						</tr><?
					}
				}?>
			</table>
		</div>
	</div>
</div>



