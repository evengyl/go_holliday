<form method="post" action="#"  data-toggle="validator" role="form">

	<h4 class="title col-md-12">Partie personnelle<hr></h4>
    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Login</span>
            	<input id="login_form" name="login" type="text" value="<?= $infos_user->login ?>" maxlength="20" pattern="[a-zA-Z_]{,6}" class="form-control" data-error="Votre login est trop court ou contient des chiffres" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Adresse Email</span>
            	<input id="mail_form" name="mail" type="email" value="<?= $infos_user->email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" data-error="Votre adresse Email n'est pas valide" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Nom</span>
            	<input id="last_name_form" name="last_name" type="text" value="<?= $infos_user->last_name ?>" maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Prénom</span>
            	<input id="name_form" name="name" type="text" value="<?= $infos_user->name ?>" maxlength="50" pattern="[^0-9]+" class="form-control" data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Age</span>
            	<input id="age_form" name="age" type="text" value="<?= $infos_user->age ?>" maxlength="3" pattern="[0-9]+" class="form-control" data-error="Max 999, uniquement des chiffres" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-6">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Téléphone (Mobile)</span>
            	<input id="tel_form" name="tel" type="tel" value="<?= $infos_user->tel ?>" maxlength="10" pattern="[0-9]+" class="form-control" data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <h4 class="title col-md-12 ">Partie adresse<hr></h4>

    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Rue</span>
            	<input id="address_rue_form" name="address_rue" type="text" value="<?= $infos_user->address_rue ?>" class="form-control">
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Numéro</span>
            	<input id="address_numero_form" id="address_numero" type="text" value="<?= $infos_user->address_numero ?>" class="form-control" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Ville</span>
            	<input id="ville_form" name="ville" type="text" value="<?= $infos_user->address_localite ?>" class="form-control">
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Code Postal</span>
            	<input id="zip_code_form" name="zip_code" type="text" value="<?= $infos_user->zip_code ?>" maxlength="5" pattern="[0-9]+" class="form-control" data-error="Code postal incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

    <div class="col-md-12">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Pays</span>
            	<input id="pays_form" name="pays" type="text" value="<?= $infos_user->pays ?>" pattern="[a-zA-Z_- ]+" class="form-control" data-error="Pays inconnu" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="text-center col-md-12"><hr>
    	<input type="hidden" name="rand_id" value="<?= $rand_id ?>">
        <button type="submit" class="btn btn-success btn-fill btn-wd">Update Profile</button>
    </div>
    <div class="clearfix"></div>
</form>