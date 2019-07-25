<div style="margin-top:15px; background:url('/images/autres/back_part_title_create_announce.png') no-repeat center;" class="col-xs-12 panel panel-default">
	<div style="margin-top:15px;" class="panel-heading" role="tab" id="headingOne">
		<h4>Titre de l'annonce <small class="text-muted thin">(Ce titre apparaîtra en premier lors des recherches)</small></h4>
	</div>
	<div class="panel-body">

        <div class="form-group">
            <div class="input-group">
            	<span class="input-group-addon">Titre de l'annonce</span>
				<input 
                    name="title" 
                    type="text" 
                    maxlength="200" 
                    pattern=".{6,}" 
                    placeholder="Requis" 
                    class="form-control" 
                    required 
                    data-error="Votre titre est trop court, veuillez entrer au minimum 6 caractères"
                    value="<?= (isset($_POST['title']))? $_POST['title'] : ''; ?>">
            </div>
            <div class="help-block with-errors"></div>
        </div>


        <div class="form-group">
            <div class="input-group">
            	<span class="input-group-addon">Sous titre <small class="text-muted thin">(ex : vue sur mer etc...)</small></span>
				<input 
                    name="sub_title" 
                    type="text" 
                    pattern=".{6,}" 
                    maxlength="200" 
                    placeholder="Non obligatoire" 
                    class="form-control" 
                    data-error="Si ce champ n'est pas vide alors il doit comporter au moins 6 lettres / chiffres"
                    value="<?= (isset($_POST['sub_title']))? $_POST['sub_title'] : ''; ?>">
            </div>
            <div class="help-block with-errors"></div>
        </div>

	</div>
</div>
<? affiche($_POST); ?>