<header id="head" class="secondary"></header>
<div class="container text-center">

    <div class="row">
        <h1 class="thin">Commencer votre recherche ici</h1>
        <p class="text-muted">
           Pour Commencer votre recherche, cliquez d'abord sur le type de vacances dont vous rêvez.
        </p><br><?
        foreach($array_type as $row_type)
        {?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail"><?
                    if(isset($row_type->icon))
                        echo $row_type->icon;?>
                    <hr>
                    <img src="/images/categories/<?= $row_type->img; ?>" class="img-responsive" alt="<?= $row_type->name; ?>">
                    <div class="caption">
                        <h3><?= $row_type->title; ?></h3>(<?= $row_type->nb_annonces; ?> Annonces)
                        <p class="text-muted"><?= $row_type->text; ?></p>
                        <p><a href="/Recherche/<?= $row_type->type_vacances_name_human; ?>" class="btn btn-primary" role="button">Je choisi les vacances "<?= $row_type->type_vacances_name_human; ?>"</a></p>
                    </div>
                </div>
            </div><?
        }?>
        <a href="/Recherche/Toutes-les-annonces" class="btn btn-success" style="margin-top:15px; margin-bottom:15px;">
            Je veux voir toutes les annonce disponible sur <?= $_app->site_name?>
        </a>
    </div>
</div>