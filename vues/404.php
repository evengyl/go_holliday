<header id="head" class="secondary"></header>
<div class="container">
	<div class="row">
		<article class="col-xs-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">Error 404 Page not found</h1>
			</header>
		</article>				
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 class="thin text-center">Attention cette page n'existe pas</h3>
					<p class="text-center text-muted">
						<?= $_SESSION['error_admin'] ?><br>
						Retourner à <a href="/home">l'accueil</a>.
					</p>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

	<?
	unset($_SESSION['error_admin']);
	?>