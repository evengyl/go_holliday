<?
function get_tpl_mail_password_recover($title_mail, $password_mail)
{?>
	<html>
		<head>
			
		</head>
		<body>
			<header></header>
			<div class="header">
				<h1><?= $title_mail ?></h1>
			</div>
			<div class="container">
				Voici votre mot de passe : <?= $password_mail; ?>
			</div>
			<footer>
				
			</footer>
		</body>
	</html>
<?
}
