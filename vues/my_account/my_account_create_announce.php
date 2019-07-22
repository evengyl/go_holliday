<div class="secondary" id="head"></div>
<div class="container-fluid text-center" style="background-color: white;">

	<div class="row">
		<h3 class="thin">Création d'une annonce</h3><hr>
	</div>

	<div class="row page_create_annonce">
		<div class="col-xs-8 col-xs-offset-2">
			<form method="post" action="" data-toggle="validator" role="form" >

				<div style="margin-top:15px; background:url('/images/autres/back_part_title_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
					<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
						<h4>Titre de l'annonce <small class="text-muted thin">(Ce titre apparaîtra en premier lors des recherches)</small></h4>
					</div>
					<div class="panel-body">

	                    <div class="form-group">
	                        <div class="input-group">
	                        	<span class="input-group-addon">Titre de l'annonce</span>
								<input name="title" type="text" maxlength="200" pattern=".{6,}" placeholder="Requis" class="form-control" required data-error="Votre titre est trop court, veuillez entrer au minimum 6 caractères">
	                        </div>
	                        <div class="help-block with-errors"></div>
	                    </div>


	                    <div class="form-group">
	                        <div class="input-group">
	                        	<span class="input-group-addon">Sous titre <small class="text-muted thin">(ex : vue sur mer etc...)</small></span>
								<input name="sub_title" type="text" pattern=".{6,}" maxlength="200" placeholder="Non obligatoire" class="form-control" data-error="Si ce champ n'est pas vide alors il doit comporter au moins 6 lettres / chiffres">
	                        </div>
	                        <div class="help-block with-errors"></div>
	                    </div>

					</div>
				</div>


				<div class="col-xs-12 panel panel-default" style="margin-top:15px; background:url(<?= $slides; ?>) no-repeat center;">
					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<h4>Ajouter dès à présent vos photos / images (10 Max)<br>
						<small class="text-muted thin">(La première sera utilisée comme images principale de votre annonce)</small></h4>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 dropzone" id="dropzone_img_upload"></div>
					    <hr>
						<div class="row col-xs-12" id="list_image_uploaded"></div>
					</div>
				</div>


				<div style="margin-top:15px; background:url('/images/autres/back_address_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<h4>Partie adresse<br>
						<small class="text-muted thin">(L'adresse de votre bien mis en location)</small></h4>
					</div>

					<div class="panel-body">
						<div class="col-xs-12">
					    	<div class="form-group has-feedback">

					        	<div class="input-group">
					            	<span class="input-group-addon">Camping / Zone / Immeuble</span>
					            	<input id="lieu_dit_form" name="address_lieux_dit" type="text" value="" class="form-control">
					        	</div>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>

						<div class="col-md-8">

					    	<div class="form-group has-feedback">
					        	<div class="input-group">
					            	<span class="input-group-addon">Rue</span>
					            	<input required id="address_rue_form" name="address_rue" type="text" value="" class="form-control">
					        	</div>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>

					    <div class="col-md-4">

					    	<div class="form-group has-feedback">
					        	<div class="input-group">
					            	<span class="input-group-addon">Numéro</span>
					            	<input required id="address_numero_form" id="address_numero" type="text" value="" class="form-control" >
					        	</div>
					        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>

					    <div class="col-md-8">

					    	<div class="form-group has-feedback">
					        	<div class="input-group">
					            	<span class="input-group-addon">Ville</span>
					            	<input required id="ville_form" name="address_localite" type="text" value="" class="form-control">
					        	</div>
					        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>

					    <div class="col-md-4">

					    	<div class="form-group has-feedback">
					        	<div class="input-group">
					            	<span class="input-group-addon">Code Postal</span>
					            	<input required id="zip_code_form" name="zip_code" type="text" value="" maxlength="5" pattern="[0-9]+" class="form-control" data-error="Code postal incorrect" >
					        	</div>
					        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>

					    <div class="col-xs-12">

					    	<div class="form-group has-feedback">
					        	<div class="input-group">
					            	<span class="input-group-addon">Pays</span>
					            	<select required name="pays" id="pays_form" class="form-control">
					            		<option selected name="pays" value="Belgique">Belgique</option>
					            		<option name="pays" value="France">France</option>
					            		<option name="pays" value="French Guiana">French Guiana</option>
					            		<option name="pays" value="French Polynesia">French Polynesia</option>
					            		<option name="pays" value="French Southern Territories">French Southern Territories</option>
					            		<option name="pays" value="Germany">Germany</option>
					            		<option name="pays" value="Croatia">Croatia</option>
					            		<option name="pays" value="Canada">Canada</option>
					            		<option name="pays" value="Andorra">Andorra</option>
					            		<option name="pays" value="Guadeloupe">Guadeloupe</option>
					            		<option name="pays" value="Italie">Italie</option>
					            		<option name="pays" value="Luxembourg">Luxembourg</option>
					            		<option name="pays" value="Martinique">Martinique</option>
					            		<option name="pays" value="Pays-Bas">Pays-Bas</option>
					            		<option name="pays" value="Netherlands Antilles">Netherlands Antilles</option>
					            		<option name="pays" value="Panama">Panama</option>
					            		<option name="pays" value="Poland">Poland</option>
					            		<option name="pays" value="Portugal">Portugal</option>
					            		<option name="pays" value="Reunion Island">Reunion Island</option>
					            		<option name="pays" value="Spain">Spain</option>
					            		<option name="pays" value="United Kingdom">United Kingdom</option>
					            		<option name="pays" value="United State">United State</option>
					            	</select>
					        	</div>
					        	<span class="glyphicon form-control-feedback" style="right: 15px;" aria-hidden="true"></span>
					        	<div class="help-block with-errors"></div>
					    	</div>

					    </div>
					</div>
				</div>

				<div style="margin-top:15px; background:url('/images/autres/back_part_date_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<h4>Ajotuer une période de location pour cette annonce</h4>
						<small class="text-muted thin">La date de période comprends la date ou la première location peux être mise en route et la date de fin</small>
					</div>
					<!-- Partie date des annonce MODAL-->
					<div class="panel-body">
						<div class="text-center col-xs-12"><hr>

		                    <div class="form-group">
		                        <div class="input-group">
		        					<span class="input-group-addon">Date de début de saison</span>
									<input type="text" name="start_saison" class="form-control" id="datepicker_start_">
		                        </div>
		                    </div>


		                    <div class="form-group">
		                        <div class="input-group">
		        					<span class="input-group-addon">Date de fin de saison</span>
									<input type="text" name="end_saison" class="form-control" id="datepicker_end_">
		                        </div>
		                    </div>

					    </div>
					</div>
				</div>

				<div style="margin-top:15px; background:url('/images/autres/back_part_complementary_infos_create_announce.png') no-repeat top;" class="col-xs-12 panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<h4>Informations complémentaires</h4>
						<small class="text-muted thin">Remplir un maximum d'informations vous permettra d'être mieux mis en avant graçe à des recherches plus poussées</small>
					</div>
					
					<div class="panel-body">
						<div class="text-center col-xs-12"><hr>

		                    <div class="form-group">
		                        <div class="input-group">
		        					<span class="input-group-addon">Nombre de personne maximums acceptées</span>
									<input type="text" name="max-personn" maxlength="2" pattern="[0-9]{2}" class="form-control" data-error="Le nombre de personnes s'écrit avec des chiffres.">
		                        </div>
		                        <div class="help-block with-errors"></div>
		                    </div>

					    </div>
					</div>

					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<h5>Activités proche de ce lieu</h5>
						<small class="text-muted thin">(Nous estimons que les activités dites proches, sont ou dans le lieux, ou très proche, moins d'un KM)</small>
					</div>

					<div class="panel-body" style="padding:0 0 15px 0;">
						<div class="col-xs-12"style="background:white;">
							<h6>Sport(s)</h6>
		                    <div class="form-group">

		                        <div class="input-group col-xs-12">
								    <div class="checkbox">
								    	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="foot">Terrain de foot
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="basket">Terrain de basket
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="tennis">Terrain de tennis
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="petanque">Terrain de pétanque
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="piscine">Piscine
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="aqua_center">Centre Aquatique
						        		</label>
						        		<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="sport">Salle de sport
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="velos">Vélos
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="skate">Skate-park
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="sport" value="arc">Tir à l'arc
							        	</label>
								    </div>
		                        </div>
		                    </div>



							<h6>Autre(s) activité(s)</h6>
		                    <div class="form-group">
		                        <div class="input-group col-xs-12">
								    <div class="checkbox">
								    	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="hiking">Randonnée balisée
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="dancing">Soirée dansante / chantante
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="disco">Discothèque
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="restaurant">Restaurant
							        	</label>
								    	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="plage">Plage
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="bar">Bar
							        	</label>
							        	<label class="col-xs-4" style="text-align:left;">
								        	<input type="checkbox" name="activity" value="spa">Termes / Spa
							        	</label>
								    </div>
		                        </div>
		                    </div>

		                    <h6>Si des activités ne figure pas dans ces listes, veuillez nous les fournir ici, nous prendre le temps de les ajoutées</h6>
		                    <div class="form-group">
		                        <div class="input-group">
		        					<span class="input-group-addon">Autre(s) (séparé d'une virgule)</span>
									<input type="text" name="other_activity" pattern="[a-zA-Z,]{2,}" placeholder="exemple, exemple, exemple" class="form-control">
		                        </div>
		                    </div>

					    </div>
					</div>
				</div>

				<div style="margin-top:15px; background:url('/images/autres/back_address_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
					<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
						<h4>Partie prix <small class="text-muted thin">(Ces prix sont purement indicatifs, il permettrons d'affiner les recherches)</small></h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="radio">
								<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Nuit</span>
								<label class="checkbox-inline">
									<input type="radio" name="one_night" checked value="0-50" required>0€ - 50€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_night" value="51-100" required>51€ - 100€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_night" value="101-200" required>101€ - 200€&nbsp;&nbsp;
								</label><hr>
							</div>

							<div class="radio">
								<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Week-end</span>
								<label class="checkbox-inline">
									<input type="radio" name="week_end" checked value="0-100" required>0€ - 100€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="week_end" value="101-150" required>101€ - 150€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="week_end" value="151-200" required>151€ - 200€&nbsp;&nbsp;
								</label><hr>
							</div>

							<div class="radio" style="">
								<span class="input-group-addon" style="border-radius:4px; border-right:1px solid #ccc;">Tranche tarrifaire pour 1 Semaine</span>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" checked value="0-100" required>0€ - 100€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" value="101-200" required>101€ - 200€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" value="201-300" required>201€ - 300€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" value="301-400" required>301€ - 400€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" value="401-500" required>401€ - 500€&nbsp;&nbsp;
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="one_week" value="501-1000" required>501€ - 1000€&nbsp;&nbsp;
								</label><hr>
							</div>
						</div>
					</div>
				</div>


			    <div class="text-center col-xs-12"><hr>
			    	<input type="hidden" name="rand_id_create_annonce" value="<?= $rand_id_create_annonce ?>">
			        <button type="submit" class="btn btn-success btn-fill btn-wd">Valider la création de l'annonce</button>
			    </div>
			    <div class="clearfix"></div>


			</form>
		</div>

		<div class="col-xs-2">
        	__MOD2_my_account_lateral_right_account__
    	</div>
	</div>
</div>


<script>

var url_uploads = "/ajax/controller/upload_image_annonces.php";
var accept = ".png,.jpg,.jpeg,.bnp,.gif,.tif";
Dropzone.autoDiscover = false;



// Dropzone class:
var myDropzone = new Dropzone("#dropzone_img_upload",
{
	url: "/ajax/controller/upload_image_annonces.php",
	paramName: "file",
    acceptedFiles: accept,
    createImageThumbnails: true,
    addRemoveLinks: true,
    maxFiles: 10,
    success: function(){
    	list_preview();
    }

});

$(document).ready(function()
{
	list_preview();



	$(function(){
		$.datepicker.regional['fr'] = {
			closeText: 'Fermer',
			prevText: '&#x3c;Préc',
			nextText: 'Suiv&#x3e;',
			currentText: 'Aujourd\'hui',
			monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
			'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
			monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
			'Jul','Aou','Sep','Oct','Nov','Dec'],
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
			dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
			weekHeader: 'S',
			dateFormat: 'dd MM yy',
			firstDay: 1,
			isRTL: true,
			showMonthAfterYear: true,
			yearSuffix: '',
			numberOfMonths: 1,
			showButtonPanel: true
			};
		$.datepicker.setDefaults($.datepicker.regional['fr']);
    	$( "#datepicker_start_" ).datepicker();
    	$( "#datepicker_start_" ).datepicker( "option", "prevText" );

    	$( "#datepicker_end_" ).datepicker();
    	$( "#datepicker_end_" ).datepicker( "option", "prevText" );


  	});

});


function list_preview()
{
	$.ajax({
		url: url_uploads,
		type: 'GET',
		data: "option=preview",
		dataType: "html",
		success:function(data){
			$('#list_image_uploaded').html(data);
		}
	});
}

</script>
