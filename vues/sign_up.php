<?
if(isset($_SESSION['last_added_subscribe']) && $_SESSION['last_added_subscribe'])
{?>
	<div class="col-xs-12 col-without-padding connect-form"><?
		if(isset($_SESSION['success']))
		{
			echo '<p class="bg-success">'.$_SESSION['success'].'</p>';
			unset($_SESSION['success']);
		}?>
		<p class="bg-info" style="text-align: center; font-size:16px; color:black">Vous pouvez vous connecté directement ici : <a href="?page=login">Se connecter</a></p>
	</div><?
	unset($_SESSION['last_added_subscribe']);
}
else
{?>
	<div class="col-xs-12 col-without-padding connect-form" style="margin-top:25px;">	
		<div class="col-xs-12" style="padding:15px;">
			Si vous avez déjà un compte c'est par ici : <a href="?page=login">Se connecter</a></br>
			Attention, votre login et votre mot de passe doivent au minimum faire 6 caractères.
		</div>
		<form action="#" method="post" class="col-lg-6 col-lg-offset-3">

			<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				<input name="pseudo" type="text" class="form-control " required placeholder="Pseudo">
			</div>

			<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<input name="password-1" type="password" class="form-control " required placeholder="Mot de passe">
			</div>

			<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<input name="password-2" type="password" class="form-control " required placeholder="Confirmer le mot de passe">
			</div>

			<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<input name="email" type="mail" class="form-control " required placeholder="Adresse Email (pas de pub)">
			</div>
			
			<input type="hidden" name="return_form_complet" value="14175155">
			<button type="submit" class="col-lg-4 btn btn-block btn-default">S'inscrire</button>

		</form>
	</div><?
	unset($_SESSION['error']); // permet de ne pas afficher les erreurs de connection si on reload la page
}


?>