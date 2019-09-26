<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/fr.js"></script>

<link rel="stylesheet" type="text/css" href="/css/lightpick.css">
<script src="/js/lightpick.js"></script>


<div style="margin-top:15px; background:url('/images/autres/back_part_date_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h4>Ajotuer une période de location pour cette annonce</h4>
		<small class="text-muted thin">La date de période comprends la date ou la première location peux être mise en route et la date de fin</small><br>
		<small class="text-muted thin"><b>Si aucune date n'est sélectionnée une période de un mois sera enregistrée</b></small>
	</div>
	<!-- Partie date des annonce MODAL-->
	<div class="panel-body">
		<div class="text-center col-xs-12"><hr>
			<div class="form-group has-feedback">
				<div class="col-xs-6">
					<div class="input-group">
						<div id="at" class="input-group-addon">Du : <?=(isset($annonce->date_start_saison))?$annonce->date_start_saison:'';?></div>
						<input value="<?=(isset($annonce->date_start_saison))?$annonce->date_start_saison:'';?>" name="start_saison" required class="form-control" type="text" id="start_datepicker" placeholder="Date de début de saison" />
					</div>
				</div>
			</div>

			<div class="form-group has-feedback">
				<div class="col-xs-6">
					<div class="input-group">
						<div id="to" class="input-group-addon">Au : <?=(isset($annonce->date_end_saison))?$annonce->date_end_saison:'';?></div>
						<input value="<?=(isset($annonce->date_end_saison))?$annonce->date_end_saison:'';?>" required name="end_saison" class="form-control" type="text" id="end_datepicker" placeholder="Date de fin de saison"/>
					</div>
				</div>
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
		onSelect: function(start){
	        var str = 'Du : ';
	        str += start ? start.format('Do MMMM YYYY') + ' ' : '';
			$('#at').html(str);
	    }
	});


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
		onSelect: function(end){
	        var str = 'Au : ';
	        str += end ? end.format('Do MMMM YYYY') : '...';
	        $('#to').html(str);
	    }
	});
});

</script>