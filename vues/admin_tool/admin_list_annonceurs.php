 <div class="col-lg-12">
    <div class="col-lg-12 annonces_list text-center">
    	<hr>
    	<? require("admin_status_annonce.php"); ?>
		<h3 class="thin">Liste des Annonceurs</h3>
		<hr>

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
										<a data-toggle="modal" style="padding:3px 15px;" data-target="#Mesage_to_annonceur_<?= $row_annonceurs->id; ?>" class="btn btn-info btn-xs">Contacter
										</a>
										<a class="btn btn-primary btn-xs" style="padding:3px 15px;" role="button" data-toggle="collapse" href="#collapse_annonce_<?= $row_annonceurs->id; ?>" aria-expanded="false" aria-controls="collapseExample">
											Voir ses annonces	
										</a>
									</td>
								</tr>

								<div class="collapse" id="collapse_annonce_<?= $row_annonceurs->id; ?>">
									<div class="well"><?
										if(!empty($row_annonceurs->annonces))
										{
											foreach($row_annonceurs->annonces as $row_annonces)
											{
												$btn = "danger";
												if($row_annonces->user_validate)
													$btn = "warning";

												if($row_annonces->admin_validate)
													$btn = "info";

												if($row_annonces->active)
													$btn = "success";

												?>
    											<a href='/Annonces/<?= $row_annonces->id ?>' type="button" style="margin-bottom:15px;"  class="thin btn btn-<?= $btn ?>">
    												Voir / Editer : Id-<?= $row_annonces->id ?><br>
    												<?= $row_annonces->title; ?><br>
    												<?= $row_annonces->vues; ?> vues<br>
    											</a><?
											}
										}?>

										<div class="row">
											<hr>
											<span class="col-xs-12">Légende : (du rouge (moins aboutti) au vert (en ligne)</span>
											<div style="padding:5px;" disabled class="col-xs-3 btn btn-danger">(Rouge) Aucune validation</div>
											<div style="padding:5px;" disabled class="col-xs-3 btn btn-warning">(Orange) Validation user ok</div>
											<div style="padding:5px;" disabled class="col-xs-3 btn btn-info">(Bleu) Validation administrative ok</div>
											<div style="padding:5px;" disabled class="col-xs-3 btn btn-success">(Vert) En ligne</div>
										</div>
									</div>

								</div>


								<div class="modal fade" id="Mesage_to_annonceur_<?= $row_annonceurs->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								    <div class="modal-dialog modal-lg" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                <h4 class="modal-title">Enoyer un mail à <?= $row_annonceurs->name." ".$row_annonceurs->last_name ?></h4>
								            </div>
								            <div class="modal-body">
								            	<form action="#" method="post">
								            		<input type="hidden" name="send_message_annonceur">
								            		<input type="hidden" name="email_annonceur" value="<?= $row_annonceurs->mail; ?>">
								            		<input type="hidden" name="name_annonceur" value="<?= $row_annonceurs->name." ".$row_annonceurs->last_name ?>">
								                    <textarea rows="3" name="message" class="form-control" placeholder=""></textarea>
								                    <button style="margin-top:15px;" class="btn btn-info" type="submit" role="button">
								                        Envoyer
								                    </button>
							                    </form>
								            </div>
								        </div>
								    </div>
								</div><?
								
							}
						}?>
					</table>
				</div>
			</div>
		</div>    		
	</div>
</div>

