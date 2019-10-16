<div class="jumbotron" style="margin-top:15px;">
	<div class="row">
		<h3 class="text-center thin" style="margin-top:0px;">Détails</h3>
		<div class="row" style="margin-top:0px;">
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-home"></i>Habitation</h4></div>
				<div class="h-body text-center">
					<img src="/images/habitats/<?= $annonce->habitat_img ?>">
					<h3 class="text-center" style="margin-top:15px;"><?= $annonce->habitat_name_human ?></h3>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-euro-sign"></i>Gamme de prix</h4></div>
				<div class="h-body text-center">
					<p><?= $annonce->price_one_night_human; ?></p>
					<p><?= $annonce->price_week_end_human; ?></p>
					<p><?= $annonce->price_one_week_human; ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-child"></i>Liste d'activités à proximité direct</h4></div>
				<div class="h-body text-center"><?
					foreach($annonce->activity as $row_activity)
					{
						echo "<p class='text-muted'>". $row_activity->name_human ."</p>";
					}?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="h-caption"><h4><i class="fas fa-volleyball-ball"></i>Liste des sports à proximité direct</h4></div>
				<div class="h-body text-center"><?
					foreach($annonce->sport as $row_sport)
					{
						echo "<p class='text-muted'>". $row_sport->name_human ."</p>";
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
				<div class="h-caption"><h4><i style="color:<?=($annonce->handicap)?'#5cb85c':'#d9534f';?>" class="fab fa-accessible-icon"></i>
				<?=($annonce->handicap)?'Accès personnes à mobilité réduite':'Pas d\'accès pour les personnes à mobilitée réduite';?></h4></div>
			</div>
			<div class="col-md-4 highlight">
				<div class="h-caption"><h4><i style="color:<?=($annonce->pet)?'#5cb85c':'#d9534f';?>" class="fas fa-dog"></i>
				<?=($annonce->pet)?'Animaux de compagnie autorisé':'Les animaux de compagnies ne sont pas acceptés';?></h4></div>
			</div>
			<div class="col-md-4 highlight">
				<div class="h-caption"><h4><i style="color:<?=($annonce->parking)?'#5cb85c':'#d9534f';?>"  class="fas fa-car-side"></i>
				<?=($annonce->parking)?'Parking à proximité immédiate':'Il n\'y a rien pour se garer juste à coté';?></h4></div>
			</div>
		</div>
	</div>
</div>


<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		<h4 class="text-center thin" style="margin-top:0px;"><?= $annonce->caution_human; ?></h4>
	</div>
</div>