 <div class="col-lg-9">
    <div class="col-lg-12 annonces_list text-center">
		<h3 class="thin">List des users VIP - NON VIP</h3>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-without-padding col-without-radius">
					<table style="font-size:14px;" class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>User Type</th>
							<th>Prénom</th>
							<th>Nom de famille</th>
							<th>Tel</th>
							<th>Mail</th>
							<th>Date de fin d'abonement</th>
							<th>Temps restant</th>
						</tr><?
						if(!empty($list_user_vip)){
							foreach($list_user_vip as $row_user_vip)
							{
								$time_end = strtotime($row_user_vip->date_fin_abonement);
								$time_now = time();
								$to_purge = 'btn-success';

								if($time_end < $time_now)
									$to_purge = "btn-danger";

								$date_one_week = $time_now + 604800;
								if($time_end >= $time_now && $time_end <= $date_one_week)
									$to_purge = 'btn-warning';


								?><tr class='<?= $to_purge; ?>'>
									<td><?= $row_user_vip->id; ?></td>
									<td><?
										if($row_user_vip->user_type == 2)
										{
											echo "Encore VIP";
										}
										else if($row_user_vip->user_type == 1)
										{
											echo "Pas / Plus VIP";
										}?>
									</td>
									<td><?= $row_user_vip->name; ?></td>
									<td><?= $row_user_vip->last_name; ?></td>
									<td><?= $row_user_vip->tel; ?></td>
									<td><?= $row_user_vip->email; ?></td>
									<td><?= date('d/m/Y', strtotime($row_user_vip->date_fin_abonement)); ?></td>
									<td><?= $row_user_vip->time_to_rest_abo; ?></td>
								</tr><?
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>    		
	</div>
</div>

