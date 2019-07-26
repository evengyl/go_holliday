<div style="margin-top:15px; background:url('/images/autres/back_address_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h4>Partie adresse<br>
		<small class="text-muted thin">(L'adresse de votre bien mis en location)</small></h4>
	</div>

	<div class="panel-body">


		<div class="col-xs-6">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Camping / Zone / Immeuble / Lieux dit</span>
	            	<input 
	            		required
		            	id="lieu_dit_form" 
		            	name="address_lieux_dit" 
		            	type="text" 
		            	maxlength="100" 
		            	value="<?=(isset($_POST['address_lieux_dit']))?$_POST['address_lieux_dit']:'';?>" 
		            	class="form-control">
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>

		<div class="col-md-6">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Rue</span>
	            	<input
	            		required 
		            	id="address_rue_form" 
		            	name="address_rue" 
		            	maxlength="100" 
		            	type="text" 
		            	value="<?=(isset($_POST['address_rue']))?$_POST['address_rue']:'';?>" 
		            	class="form-control">
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>


	    <div class="col-md-6">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Ville</span>
	            	<input 
		            	required 
		            	id="ville_form" 
		            	name="address_localite" 
		            	maxlength="50" 
		            	type="text" 
		            	value="<?=(isset($_POST['address_localite']))?$_POST['address_localite']:'';?>" 
		            	class="form-control">
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>


	    <div class="col-md-3">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Numéro</span>
	            	<input 
		            	required 
		            	id="address_numero_form" 
		            	name="address_numero" 
		            	maxlength="15"
		            	type="text" 
		            	value="<?=(isset($_POST['address_numero']))?$_POST['address_numero']:'';?>" 
		            	class="form-control" >
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>
	    

	    <div class="col-md-3">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Code Postal</span>
	            	<input 
		            	required 
		            	id="zip_code_form" 
		            	name="address_zip_code" 
		            	type="text" 
		            	value="<?=(isset($_POST['address_zip_code']))?$_POST['address_zip_code']:'';?>" 
		            	maxlength="5" 
		            	pattern="[0-9]+" 
		            	class="form-control" 
		            	data-error="Code postal incorrect" >
	        	</div>
	        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>


	    <div class="col-xs-12">
	    	<div class="form-group has-feedback">
	        	<div class="input-group">
	            	<span class="input-group-addon">Pays</span>
	            	<select required name="address_pays" id="pays_form" class="form-control">
	            		<?
	            		$selected = true;
	            			foreach($array_list_pays_for_tpl as $row_pays)
	            			{?>
								<option 
									<?=($selected)?'selected':''; ?>
									name="address_pays"
									value="<?= $row_pays->name; ?>"
								>
									<?= $row_pays->human_name; ?>	
								</option><?

            					$selected = false;
	            			}
	            		?>
	            	</select>
	        	</div>
	        	<span class="glyphicon form-control-feedback" style="right: 15px;" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>
	    </div>

	    <small class="text-muted thin">(Si quelque chose manque ou ne convient pas, veuillez en informer l'administration)</small>
	</div>
</div>