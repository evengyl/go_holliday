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
	            	<input required id="zip_code_form" name="address_zip_code" type="text" value="" maxlength="5" pattern="[0-9]+" class="form-control" data-error="Code postal incorrect" >
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
	            		<option selected name="address_pays" value="Belgique">Belgique</option>
	            		<option name="address_pays" value="France">France</option>
	            		<option name="address_pays" value="French Guiana">French Guiana</option>
	            		<option name="address_pays" value="French Polynesia">French Polynesia</option>
	            		<option name="address_pays" value="French Southern Territories">French Southern Territories</option>
	            		<option name="address_pays" value="Germany">Germany</option>
	            		<option name="address_pays" value="Croatia">Croatia</option>
	            		<option name="address_pays" value="Canada">Canada</option>
	            		<option name="address_pays" value="Andorra">Andorra</option>
	            		<option name="address_pays" value="Guadeloupe">Guadeloupe</option>
	            		<option name="address_pays" value="Italie">Italie</option>
	            		<option name="address_pays" value="Luxembourg">Luxembourg</option>
	            		<option name="address_pays" value="Martinique">Martinique</option>
	            		<option name="address_pays" value="Pays-Bas">Pays-Bas</option>
	            		<option name="address_pays" value="Netherlands Antilles">Netherlands Antilles</option>
	            		<option name="address_pays" value="Panama">Panama</option>
	            		<option name="address_pays" value="Poland">Poland</option>
	            		<option name="address_pays" value="Portugal">Portugal</option>
	            		<option name="address_pays" value="Reunion Island">Reunion Island</option>
	            		<option name="address_pays" value="Spain">Spain</option>
	            		<option name="address_pays" value="United Kingdom">United Kingdom</option>
	            		<option name="address_pays" value="United State">United State</option>
	            	</select>
	        	</div>
	        	<span class="glyphicon form-control-feedback" style="right: 15px;" aria-hidden="true"></span>
	        	<div class="help-block with-errors"></div>
	    	</div>

	    </div>
	</div>
</div>