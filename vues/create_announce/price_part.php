<div style="margin-top:15px; background:url('/images/autres/back_address_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>Partie prix <small class="text-muted thin"><br>
			(Ces prix sont purement indicatifs, il permettrons d'affiner les recherches<br>
			Ainsi que d'estimer la valeur des voyages pour les Locataires, attention, mentir sur les prix appliqué risque de vous faire perdre des clients.)</small>
		</h4>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<div class="radio">
				<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Nuit</span>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_night" 
						<?= (isset($last_announce->price_one_night) && $last_announce->price_one_night == '0-40')? 'checked="true"' : ''; ?> 
						value="0-40" required>0€ - 40€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_night" 
						<?= (isset($last_announce->price_one_night) && $last_announce->price_one_night == '41-70')? 'checked="true"' : ''; ?> 
						value="41-70" required>41€ - 70€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_night" 
						<?= (isset($last_announce->price_one_night) && $last_announce->price_one_night == '71-100')? 'checked="true"' : ''; ?> 
						value="71-100" required>71€ - 100€&nbsp;&nbsp;
				</label>				
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_night" 
						<?= (isset($last_announce->price_one_night) && $last_announce->price_one_night == '101-150')? 'checked="true"' : ''; ?> 
						value="101-150" required>101€ - 150€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_night" 
						<?= (isset($last_announce->price_one_night) && $last_announce->price_one_night == '151-200')? 'checked="true"' : ''; ?> 
						value="151-200" required>151€ - 200€&nbsp;&nbsp;
				</label><hr>
			</div>

			<div class="radio">
				<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Week-end</span>
				<label class="checkbox-inline">
					<input required type="radio" name="price_week_end" 
						<?= (isset($last_announce->price_week_end) && $last_announce->price_week_end == '101-200')? 'checked="true"' : ''; ?> 
						value="0-100" required>0€ - 100€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_week_end" 
						<?= (isset($last_announce->price_week_end) && $last_announce->price_week_end == '101-150')? 'checked="true"' : ''; ?> 
						value="101-150" required>101€ - 150€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_week_end" 
						<?= (isset($last_announce->price_week_end) && $last_announce->price_week_end == '151-200')? 'checked="true"' : ''; ?> 
						value="151-200" required>151€ - 200€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_week_end" 
						<?= (isset($last_announce->price_week_end) && $last_announce->price_week_end == '201-250')? 'checked="true"' : ''; ?> 
						value="201-250" required>201€ - 250€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_week_end" 
						<?= (isset($last_announce->price_week_end) && $last_announce->price_week_end == '251-350')? 'checked="true"' : ''; ?> 
						value="251-350" required>251€ - 350€&nbsp;&nbsp;
				</label><hr>
			</div>

			<div class="radio" style="">
				<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Semaine</span>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '0-100')? 'checked="true"' : ''; ?> 
						value="0-100" required>0€ - 100€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '101-200')? 'checked="true"' : ''; ?> 
						value="101-200" required>101€ - 200€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '201-300')? 'checked="true"' : ''; ?> 
						value="201-300" required>201€ - 300€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '301-400')? 'checked="true"' : ''; ?> 
						value="301-400" required>301€ - 400€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '401-500')? 'checked="true"' : ''; ?> 
						value="401-500" required>401€ - 500€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '501-600')? 'checked="true"' : ''; ?> 
						value="501-1000" required>501€ - 1000€&nbsp;&nbsp;
				</label>
				<label class="checkbox-inline">
					<input required type="radio" name="price_one_week" 
						<?= (isset($last_announce->price_one_week) && $last_announce->price_one_week == '601-800')? 'checked="true"' : ''; ?> 
						value="601-800" required>601€ - 800€&nbsp;&nbsp;
				</label><hr>
			</div>

			<h5>Informations supplémentaires sur les prix indiqués<br>
				<small class="text-muted " style="line-height: 1.5;">
					Les prix affiché pour le nombre de nuits commandées par le clients sont comme tel<br>
					si le clients demande une réservation de 11 nuits :<br>
					Le prix par 7 nuits est de, imaginons entre 401 et 500€ et le prix par nuit est de imaginons, entre 41 et 70€<br>
					Le calcul ce fait ainsi : 11 nuits<br>
					7 nuits avec une moyenne de 500€ - 401€ = (99€ / 3)*2 = 66€ <br>
					Donc 500€ - 66€ = 466€ de moyenne pour une semaine.<br>
					466€ + (Tarif d'une nuit 70€ - 41€ = (29€ /2) = 15€)<br>
					Donc 70€ - 15€ = 55€ de moyenne par nuit<br><br>

					Pour un total de 466 + 55 + 55 + 55 + 55 = 686€ pour 12 jours et 11 nuits chez vous.<br>
				</small>
			</h5>
		</div>
	</div>

	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>Caution
			<small class="text-muted thin"><br>
				(Une caution peux être demandée, il s'agit d'une assurance d'argent qui sera rendue au locataire si tout est en ordre et comme décris dans vos préférences)
			</small>
		</h4>
	</div>
	<div class="panel-body">
        <div class="form-group has-feedback">
            <div class="input-group">
				<span class="input-group-addon">Caution (€)</span>
				<input type="text" name="caution" 
					value="<?= (isset($last_announce->caution))? $last_announce->caution : ''; ?>" 
					pattern="[0-9,.€]{1,}" placeholder="300" class="form-control">
            </div>
        </div>
	</div>
</div>
