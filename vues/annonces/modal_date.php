<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/fr.js"></script>

<link rel="stylesheet" type="text/css" href="/css/lightpick.css">
<script src="/js/lightpick.js"></script>


<div class="modal fade" id="modal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xlg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Calendrier des demandes de dates</h4>
            </div>
            <div class="modal-body">
				<div style="margin-top:15px; no-repeat center;" class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
						<small class="text-muted thin"><?= $annonce->text_date_saison; ?></small><br>

						<i style="opacity: 0.38; color:#d9534f;" class="fas fa-circle"></i>
						<small class="text-muted thin"> - Dates réservées ( Une date réservée signifie que cette date n'est plus disponible )</small><br>
						<i style="opacity: 0.5; color:#FF9B22;" class="fas fa-circle" title=""></i>
						<small class="text-muted thin"> - Dates sous options ( Une date sous option signifie qu'une demande à été émise mais que l'annonceur n'a pas encore vu / accepter la demande )</small><br>
						<i style="opacity: 0.5; color:#5cb85c;" class="fas fa-circle" title=""></i>
						<small class="text-muted thin"> - Dates disponibles</small><br>

					</div>
					<!-- Partie date des annonce MODAL-->
					<div class="panel-body">
						<div class="text-center col-xs-6 col-xs-offset-3">
							<p style="font-weight:bold;" class="thin">
								<span id="at"></span>
								<span id="to"></span><br>
								<span id="for"></span><br>
								<span id="how_many"></span><br>
								<small id="text_explain" style="display:none;" class="thin text-muted">(basé sur la moyenne définie par le propriétaire, elle peut varier.)</small>
							</p>
							<p id="start_date_selected" style="display:none;" data-value="0"></p>
							<p id="end_date_selected" style="display:none;" data-value="0"></p>
							<form method="post" action="#">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Date d'arrivée</div>
										<input name="demand_start_date" required class="form-control" type="text" id="start_datepicker" placeholder="Date d'arrivée désirée" />
									</div><br>

									<div style="display:none;" class="input-group">
										<div class="input-group-addon">Date de départ</div>
										<input name="demand_end_date" required class="form-control" type="text" id="end_datepicker" placeholder="Date de départ désirée"/>
									</div>
									<input type="hidden" name="id_annonce" value="<?= $annonce->id; ?>">
								</div>
								<input type="hidden" name="rand_id_for_demand" value="<?= $rand_id_for_demand ?>">
								<button type="submit" class="btn btn-success">Envoyer la demande</button> 
							</form>
						</div>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<h4 class="text-center thin text-muted">Comment ça marche ?</h4>
				<p class="text-left thin text-muted">
					Lorque que vous cliquerez dans les zones des textes ci-dessus, vous ouvrirez un agenda, il vous suffira de sélectionner la date
					demandée, donc en premier la date d'arrivée et en second votre date de départ, de la le site va calculer lui même combien de nuit et à combien
					s'estime vos vacances pour ces dates la, attention toute fois, les prix peuvent varier en fonction de la saison et de la valeur que le propriétaire à
					indiquée.<br>
					Ceci est une valeur approximative, vous reçevrez par email une copie de votre demande ainsi que le propriétaire.
				</p>
			</div>
		</div>
	</div>
</div>






<script>
$(document).ready(function()
{
    var picker_start = new Lightpick(
	{ 
		field: document.getElementById('start_datepicker'),
		singleDate: true,
		minDays: 2,
		autoclose : true,
		numberOfMonths:3,
		numberOfColumns:6,
		colPerMonth:4,
		lang: 'fr',
		minDate: '<?= $annonce->date_start_saison_uk_format; ?>',
    	maxDate: '<?= $annonce->date_end_saison_uk_format; ?>',
		onSelect: function(start){
			//afficher la date selectionnée sur le dessus
	        var str = 'Du ';
	        str += start ? start.format('Do MMMM YYYY') + ' ' : '';
			$('#at').html(str);

			//on set la sate select pour lused dans l'ajax pour faire le nb de nuit et le prix moyen
			var date_start = start.format('YYYY-MM-DD');
			$("#start_date_selected").attr("data-value" , date_start);


			//si l'user revient sur l input de start date on dois pouvoir mettre à jour les date quand même et le prix aussi
			var date_end = $("#end_date_selected").attr("data-value");
			if(date_end != '0')
			{
				//alors ça veuc dire qu'il a déjà select une date de retour et veux changer sa date d'arrivée
				set_nb_night_and_price(date_start, date_end);
			}


			//on peux afficher le input de date end
			$("#end_datepicker").parent().show(function() {
				var picker_end = new Lightpick(
				{ 
					field: document.getElementById('end_datepicker'),
					singleDate: true,
					minDays: 2,
					autoclose : true,
					numberOfMonths:3,
					numberOfColumns:6,
					colPerMonth:4,
					lang: 'fr',
			    	maxDate: '<?= $annonce->date_end_saison_uk_format; ?>',
					onSelect: function(end){
						//afficher la date selectionnée sur le dessus
				        var str = 'au ';
				        str += end ? end.format('Do MMMM YYYY') : '...';
				        $('#to').html(str);

				        var date_end = end.format('YYYY-MM-DD');
						$("#end_date_selected").attr("data-value" , date_end);

				        var date_start = $("#start_date_selected").attr("data-value");

				        if(date_start != '0')
				        {
				        	set_nb_night_and_price(date_start, date_end);
				        }
				    }
				});

				//va désactiver les date avant le start_date selectionner
				var array_tmp = [];
				array_tmp[0] = [];
	    		array_tmp[0].push('<?= $annonce->date_start_saison_uk_format; ?>', date_start);
				picker_end.setDisableDates(array_tmp);
			});
	    }
	});




	//va désactiver les date avec des reservations
	var list_start = ['<?=implode("', '", $list_start_date)?>'];
	var list_end = ['<?=implode("', '", $list_end_date)?>'];
	var array_tmp = [];

    for(var i = 0 ; i < list_start.length ; i++)
    {
    	array_tmp[i] = [];
    	array_tmp[i].push(list_start[i], list_end[i]);
    }

	picker_start.setDisableDates(array_tmp);

	//va mettre ne orange les date sous option
	var list_start_date_waiting = ['<?=implode("', '", $list_start_date_waiting)?>'];
	var list_end_date_waiting = ['<?=implode("', '", $list_end_date_waiting)?>'];
	var array_tmp = [];

    for(var i = 0 ; i < list_start_date_waiting.length ; i++)
    {
    	array_tmp[i] = [];
    	array_tmp[i].push(list_start_date_waiting[i], list_end_date_waiting[i]);
    }

	picker_start.setWaitingDates(array_tmp);


});



function set_nb_night_and_price(date_start, date_end)
{
	var id_annonce = '<?= $annonce->id; ?>';
	$.ajax({
        type : 'POST',
        url  : '/ajax/controller/work_date_for_datepicker.php',
        dataType : "HTML",
        data : {"action" : "calcul_nb_date_between", "date_start" : date_start, "date_end" : date_end},
        success : function(nb_night)
        {
        	$("#for").html("Pour un total de "+(parseInt(nb_night, 10)+1)+" Jours et "+nb_night+" nuit(s)");

        	$.ajax({
	            type : 'POST',
	            url  : '/ajax/controller/work_date_for_datepicker.php',
	            dataType : "HTML",
	            data : {"action" : "calcul_moy_price", "date_start" : date_start, "date_end" : date_end, "id_annonce" : id_annonce},
	            success : function(price)
	            {
	            	if(price == 0){
	            		$("#how_many").html("Plus de quatres semaines, le propriétaire vous contactera pour la valeur en");
	            	}
	            	else{
	            		$("#how_many").html("Prix total moyen de "+price+" euros");
	            	}

	            	$("#text_explain").show();
	            },
	        });
        },
    });
}



</script> 
