<header id="head" class="secondary"></header>

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Validation</h2>
        <p class="text-muted">
           il ne vous rete plus qu'à valider votre choix pour voir la liste des locations disponibles
        </p><br>

        <div class="thumbnail">
            <hr>
            <div class="caption">
                <i style="font-size:56px; color:#65b45199;" class="fas fa-umbrella-beach"></i>
                <h4>Type de vacances : </h4>
                <p class="text-muted"><?= $type; ?></p>
                <hr>
            </div>
            <div class="caption">
                <i style="font-size:56px; color:#65b45199;" class="fas fa-globe"></i>
                <h4>Pays sélectionné : </h4>
                <p class="text-muted"><?= $pays; ?></p>
                <hr>
            </div>
            <div class="caption">
                <i style="font-size:56px; color:#65b45199;" class="fas fa-home"></i>
                <h4>Type de logement sélectionné : </h4>
                <p class="text-muted"><?= $habitat; ?></p>
                <hr>
                <p>
                    <a href="/recherche" class="btn btn-primary" role="button">Je valide</a>
                    <a href="/recherche" class="btn btn-default" role="button">Je veux changer</a>
                </p>
                
            </div>
        </div>
    </div>
</div>
