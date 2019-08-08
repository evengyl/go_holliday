<div class="jumbotron" style="margin-top:15px;">
	<div class="row">
		<h3 class="text-center thin" style="margin-top:0px;">Détails</h3>
		<div class="row" style="margin-top:0px;">
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-home"></i>Habitation</h4></div>
				<div class="h-body text-center">
					<img src="/images/habitats/<?= $last_announce->img_habitat ?>">
					<h3 class="text-center" style="margin-top:15px;"><?= $last_announce->name_habitat_human ?></h3>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-euro-sign"></i>Gamme de prix</h4></div>
				<div class="h-body text-center">
					<p><?= $last_announce->price_one_night_human; ?></p>
					<p><?= $last_announce->price_week_end_human; ?></p>
					<p><?= $last_announce->price_one_week_human; ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-child"></i>Liste d'activités à proximité direct</h4></div>
				<div class="h-body text-center"><?
					foreach($last_announce->list_activity_human as $row_activity)
					{
						echo "<p class='text-muted'>". $row_activity ."</p>";
					}?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-volleyball-ball"></i>Liste des sports à proximité direct</h4></div>
				<div class="h-body text-center"><?
					foreach($last_announce->list_sport_human as $row_sport)
					{
						echo "<p class='text-muted'>". $row_sport ."</p>";
					}?>
				</div>
			</div>
		</div>
	</div>
</div>

	
<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		
		<h3 class="text-center thin" style="margin-top:0px;">Informations pratiques complémentaires</h3>
		<div class="row">
			<div class="col-md-4 highlight">
				<div class="h-caption"><h4><i style="color:<?=($last_announce->handicap)?'#5cb85c':'#d9534f';?>" class="fab fa-accessible-icon"></i>Accès personnes à mobilité réduite</h4></div>
			</div>
			<div class="col-md-4 highlight">
				<div class="h-caption"><h4><i style="color:<?=($last_announce->pet)?'#5cb85c':'#d9534f';?>" class="fas fa-dog"></i>Animaux de compagnie autorisé</h4></div>
			</div>
			<div class="col-md-4 highlight">
				<div class="h-caption"><h4><i style="color:<?=($last_announce->parking)?'#5cb85c':'#d9534f';?>"  class="fas fa-car-side"></i>Parking à proximité immédiate</h4></div>
			</div>
		</div>
	</div>
</div>


<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		<h4 class="text-center thin" style="margin-top:0px;"><?= $last_announce->caution_human; ?></h4>
	</div>
</div>