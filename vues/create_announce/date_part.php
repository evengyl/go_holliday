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


<script>
$(document).ready(function()
{
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
</script>