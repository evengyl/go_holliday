<div class="secondary" id="head"></div>
<div class="row page-create_announce col-xs-10 col-xs-offset-1" style="background-color: white;">
	<h3 class="title">Création d'annonce(s)</h3><hr>

	<h4>Ajouter dès à présent vos photos / images (10 Max)<br><small class="text-muted thin">(La première sera utilisée comme images principale de votre annonce)</small></h4>


	<div class="dropzone" id="dropzone_img_upload"></div>
    <hr>

	<div class="row" id="list_image_uploaded">
		
	</div>


	<form method="post" action="" data-toggle="validator" role="form" >
		<div class="col-md-12">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<h4>Titre de l'annonce <small class="text-muted thin">(Ce titre apparaîtra en premier lors des recherches)</small></h4>
	            	<input name="title" type="text" maxlength="255" pattern=".{4,}" placeholder="Requis" class="form-control" required data-error="Votre titre est trop court, veuillez entrer au minimum 4 caractères">
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>

	    <div class="col-md-12">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<h4>Complément de titre (ex : vue sur mer etc...) <small class="text-muted thin">(Ce sous titre apparaîtra lors de l'affichage dans les recherches)</small></h4>
	            	<input name="sub_title" type="text" maxlength="255" placeholder="Non obligatoire" class="form-control" >
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a style="color:green; text-decoration:underline;" data-toggle="collapse" href="#collapse_adresse_part" aria-expanded="true" aria-controls="collapse_adresse_part">
						Partie adresse <small class="thin">Cliquer pour faire dérouler / Ré-enrouler</small>
					</a>
				</h4>
			</div>
			<div id="collapse_adresse_part" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">

					<div class="col-md-12">
				    	<div class="form-group has-feedback">
				        	<div class="input-group">
				            	<span class="input-group-addon">Camping / Zone / Immeuble</span>
				            	<input id="lieu_dit_form" name="address_lieux_dit" type="text" value="" class="form-control">
				        	</div>
				        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				        	<div class="help-block with-errors"></div>
				    	</div>
				    </div>

					<div class="col-md-8">
				    	<div class="form-group has-feedback">
				        	<div class="input-group">
				            	<span class="input-group-addon">Rue</span>
				            	<input required id="address_rue_form" name="address_rue" type="text" value="" class="form-control">
				        	</div>
				        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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

				    <div class="col-md-12">
				    	
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
		</div>

	    <div class="text-center col-md-12"><hr>
	    	<input type="hidden" name="rand_id_create_annonce" value="<?= $rand_id_create_annonce ?>">
	        <button type="submit" class="btn btn-success btn-fill btn-wd">Valider la création de l'annonce</button>
	        <button type="submit" class="btn btn-info btn-fill btn-wd">Prévisualiser l'annonce</button>
	    </div>
	    <div class="clearfix"></div>

	</form>
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