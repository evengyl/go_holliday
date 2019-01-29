<header id="head" class="secondary"></header>
<div class="container text-center">
	<br> <br>
	<h2 class="thin">List des users VIP - NON VIP</h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-without-padding col-without-radius">
			<div class="col-xs-8 col-xs-offset-2">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>User Type</th>
						<th>Prénom</th>
						<th>Nom de famille</th>
						<th>Tel</th>
						<th>Date de fin d'abonement</th>
					</tr><?
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
									echo "VIP";
								}
								else if($row_user_vip->user_type == 1)
								{
									echo "Non VIP";
								}?>
							</td>
							<td><?= $row_user_vip->name; ?></td>
							<td><?= $row_user_vip->last_name; ?></td>
							<td><?= $row_user_vip->tel; ?></td>
							<td><?= date('d/m/Y', strtotime($row_user_vip->date_fin_abonement)); ?></td>
						</tr><?
					}
					?>
				</table>
				<a href="/admin/verify_status_vip/purge_user_vip" type="button" class="btn btn-danger btn-lg btn-block">Purger</a>
			</div>
		</div>
	</div>
</div>