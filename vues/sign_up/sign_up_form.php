<form method="post" action="#" data-toggle="validator" role="form">

	<h4 class="title col-md-12">Partie personnelle<hr></h4>


    <div class="col-md-12">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Login</span>
            	<input  required 
                        name="login" 
                        type="text" 
                        maxlength="20" 
                        value="<?= isset($_POST['login'])?$_POST['login']:''; ?>"
                        pattern="[a-zA-Z_]{6,}" 
                        class="form-control" 
                        data-error="Votre login est trop court ou contient des chiffres" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


	<div class="col-md-6">
        <div class="form-group has-feedback">
        	<div class="input-group">
        		<span class="input-group-addon">Mot de passe</span>
                <input  required 
                        name="password" 
                        type="password" 
                        data-minlength="6" 
                        class="form-control" 
                        value="<?= isset($_POST['password'])?$_POST['password']:''; ?>" 
                        id="inputPassword" 
                        data-error="Votre mot de passe doit contenir au minimum 6 caractères">
            </div>
            <div class="help-block with-errors"></div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group has-feedback">
        	<div class="input-group">
        		<span class="input-group-addon">Confirmation</span>
            	<input  required 
                        type="password" 
                        class="form-control" 
                        value="<?= isset($_POST['password'])?$_POST['password']:''; ?>" 
                        id="inputPasswordConfirm" 
                        data-match="#inputPassword" 
                        data-match-error="Oups!, les deux mots de passe ne correspondent pas.">
        	</div>
        </div>
	</div>


    <div class="col-md-12">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Adresse Email</span>
            	<input  required 
                        id="mail_form" 
                        name="mail" 
                        value="<?= isset($_POST['mail'])?$_POST['mail']:''; ?>" 
                        type="email" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        class="form-control" 
                        data-error="Votre adresse Email n'est pas valide" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-6">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Nom</span>
            	<input  required 
                        id="last_name_form" 
                        name="last_name" 
                        type="text" 
                        value="<?= isset($_POST['name'])?$_POST['name']:''; ?>" 
                        maxlength="50" 
                        pattern="[^0-9]+" 
                        class="form-control" 
                        data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-6">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Prénom</span>
            	<input  required 
                        id="name_form" 
                        name="name" 
                        type="text"  
                        maxlength="50" 
                        value="<?= isset($_POST['last_name'])?$_POST['last_name']:''; ?>" 
                        pattern="[^0-9]+" 
                        class="form-control" 
                        data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Age</span>
            	<input  required 
                        id="age_form" 
                        name="age" 
                        type="text"  
                        maxlength="3" 
                        value="<?= isset($_POST['age'])?$_POST['age']:''; ?>" 
                        pattern="[0-9]+" 
                        class="form-control" 
                        data-error="Max 999, uniquement des chiffres" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>
    

    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Téléphone (Mobile)</span>
            	<input  required 
                        id="tel_form" 
                        name="tel" 
                        type="tel" 
                        value="<?= isset($_POST['tel'])?$_POST['tel']:''; ?>" 
                        maxlength="10" 
                        pattern="[0-9]+" 
                        class="form-control" 
                        data-error="Caractère incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-12">
        <div class="form-group has-success">
            <div class="input-group" style="border: 1px solid #3c763d; color: #3c763d; background-color: #dff0d8;">
                <span class="input-group-addon" style="border:none;">Genre</span>

                <div class="radio" style="display:inline-block; margin-right:5px; margin-left:10px;">
                    <label>
                        <input value="Monsieur" checked="checked" type="radio" name="genre" >
                        Monsieur
                    </label>
                </div>
                <div class="radio" style="display:inline-block; margin-right:5px; margin-left:10px;">
                    <label>
                        <input value="Madame" type="radio" name="genre" >
                        Madame
                    </label>
                </div>
                <div class="radio" style="display:inline-block; margin-right:5px; margin-left:10px;">
                    <label>
                        <input value="Mademoiselle" type="radio" name="genre" >
                        Mademoiselle
                    </label>
                </div>
                <div class="radio" style="display:inline-block; margin-right:5px; margin-left:10px;">
                    <label>
                        <input value="N/C" type="radio" name="genre" >
                        Ne se prononce pas
                    </label>
                </div>
            </div>
        </div>
    </div>


    <h4 class="title col-md-12 ">Partie adresse <?=($_GET['option_sign_up'] == 'VIP')?'<small class="thin"> (De l\'annonceur, pas des résidences)</small>':''; ?><hr></h4>


    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Rue</span>
            	<input  required 
                        id="address_rue_form" 
                        name="address_rue" 
                        type="text" 
                        value="<?= isset($_POST['address_rue'])?$_POST['address_rue']:''; ?>" 
                        class="form-control">
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Numéro</span>
            	<input  required 
                        name="address_numero" 
                        id="address_numero" 
                        type="text" 
                        value="<?= isset($_POST['address_numero'])?$_POST['address_numero']:''; ?>" 
                        class="form-control" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-8">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Ville</span>
            	<input  required 
                        id="ville_form" 
                        name="address_localite" 
                        type="text" 
                        value="<?= isset($_POST['address_localite'])?$_POST['address_localite']:''; ?>" 
                        class="form-control">
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-4">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Code Postal</span>
            	<input  required 
                        id="zip_code_form" 
                        name="zip_code" 
                        type="text" 
                        value="<?= isset($_POST['zip_code'])?$_POST['zip_code']:''; ?>" 
                        maxlength="5" 
                        pattern="[0-9]+" 
                        class="form-control" 
                        data-error="Code postal incorrect" >
        	</div>
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>


    <div class="col-md-12">
    	<div class="form-group has-feedback">
        	<div class="input-group">
            	<span class="input-group-addon">Pays</span>
            	<select name="pays" id="pays_form" class="form-control">
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
        	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        	<div class="help-block with-errors"></div>
    	</div>
    </div>

	
	<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
		Toutes les informations complémentaires serons modifiables dans le menu "Mon compte" ensuite "Profil"<hr>
	</p>

    <?=($_GET['option_sign_up'] == 'VIP')
        ?'<p class="col-xs-12 text-center text-muted" style="margin-top:10px;">
		  <b>Votre inscription sera validée par un administrateur, vous serez contacter par Sms / Mail / Appel pour la véracité de votre demande.</b>
	      </p>'
        :''; 
    ?>
	

	<p class="col-xs-12 text-center">
		<a data-toggle="modal" href="#" data-target="#view_condition_general" class="opt_annonce">
        	<small>
                <i class="fa fa-angle-double-right "></i>
                <span>&nbsp;Cliquer ici pour voir les conditions général du site&nbsp;</span>
                <i class="fa fa-angle-double-left "></i>
            </small>
    	</a>
	</p>
	<hr>


	<div class="text-center col-md-12"><hr>
    	<input type="hidden" name="rand_id_form_sign_up" value="<?= $rand_id_form_sign_up ?>">
        <button type="submit" class="btn btn-success btn-fill btn-wd">S'inscrire</button>
    </div>
    <div class="clearfix"></div>
    
</form>
								