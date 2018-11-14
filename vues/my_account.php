<div class="col-lg-10 col-lg-offset-1 col-without-padding col-without-radius content_game">
	<div class="col-lg-2 nav-jeu" style="border-right:1px solid white;">
		<div class="col-xs-12 col-without-padding">
			<nav class="navbar">
				<div class="container-fluid nav_game col-without-padding">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_game" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class=" navbar-collapse collapse" id="nav_game">
					<ul class="nav  nav-stacked ">

						<li class="presentation cl-effect-14"><?
						if($_GET['page'] == 'password_change') $style_1 = "background-color: #eee; color: grey !important;";
						else $style_1 = "";?>
							<a style="<?= $style_1 ?> color:white;" href="?page=password_change">
								<span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Changer de Mot de passe
							</a>
						</li>

						<li class="presentation cl-effect-14"><?
						if($_GET['page'] == 'todo')	$style_2 = "background-color: #eee; color: grey !important;";
						else $style_2 = ""?>
							<a style="<?= $style_2 ?> color:white;" href="?page=todo">
								<span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Liste de choses à faire
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="col-lg-8" style="margin-top:1px;"><?

		if($_GET['page'] == "password_change")
		{?>
			<div class="col-xs-12 explication pull-left">
				<h2 class="title">Changement de mot de passe</h2>
				<h3 class="sub_title">Le mot de passe doit contenir au moins 6 caractères</h3>
			</div>
	
			<form action="#" method="post" class="">
				<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
					<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1" style="color:green">'.$_SESSION['error'].'</label><br/>':''; ?>
					<label style="color:white">Pour le Pseudo :</label>
					<input disabled name="pseudo" type="text" class="form-control " id='disabledInput' value="<?= $user->user_infos->login; ?>">
				</div>

				<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
					<label style="color:white">Nouveau mot de passe</label>					
					<input name="password-new_1" required placeholder="Mot de passe" type="password" class="form-control" value="">
				</div>

				<div  class="col-xs-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
					<label style="color:white">Confirmation du nouveau mot de passe</label>					
					<input name="password-new_2" required placeholder="Confirmation du Mot de passe" type="password" class="form-control" value="">
				</div>

				<input type="hidden" name="return_post_account_pass_change" value="18041997">
				<button type="submit" class="col-lg-4 btn btn-default">Envoyer</button>
			</form><?
		}

		else if($_GET['page'] == "todo")
		{?>
			__MOD_todo__<?
		}?>
	</div>
	
</div>


<? unset($_SESSION['error']); // permet de ne pas afficher les erreurs de connection si on reload la page ?>