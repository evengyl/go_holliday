<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		<h3 class="text-center thin" style="margin-top:0px;">Elle vous intéresse ? Vous souhaiter aller plus loin ?</h3>
		<div class="row" style="margin-top:25px;">
			<div class="col-xs-4">
		        <button class="btn btn-danger" 
		        	<?=(isset($_app->user->login))?"":"disabled"; ?> 
		        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"disabled":""; ?> 

		        	data-action="place_to_fav" data-id="<?= $annonce->id?>">
		        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"Cette annonce est déjà dans vos favorites":"Placer cette annonce dans mes favorites"; ?> </button>
		    </div>
		    <div class="col-xs-4">
		        <button class="btn btn-info" data-toggle="modal" data-target="#col-xs-4">Faire une demande de dates</button>
		    </div>
		    <div class="col-xs-4">
		        <button class="btn btn-info" data-toggle="modal" data-target="#col-xs-4">Prendre contact avec l'annonceur</button>
		    </div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function()
	{
		
		$("button[data-action='place_to_fav']").click(function(){
			var button_clicked = $(this);
			$.ajax({
	            type : 'POST',
	            url  : '/ajax/controller/fct_annonce_ajax.php',
	            dataType : "HTML",
	            data : {"app_fct" : "add_to_favorite", "id" : button_clicked.attr("data-id")},
	            success : function(data_return)
	            {
	            	button_clicked.attr("disabled", true);
	            },
	        });
		});
	});
</script>