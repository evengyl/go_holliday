<header id="head" class="secondary"></header>
<div class="container text-center">

    <div class="row">
        <h2 class="thin">Commencer votre recherche ici</h2>
        <p class="text-muted">
           Commencez votre recherche, cliquez d'abord sur le type de vacances vous souhaitez.
        </p><br><?

        foreach($array_type as $row_type)
        {?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail"><?
                    if(isset($row_type->icon_1))
                        echo $row_type->icon_1."&nbsp;";

                    if(isset($row_type->icon_2))
                        echo $row_type->icon_2."&nbsp;";

                    if(isset($row_type->icon_3))
                        echo $row_type->icon_3."&nbsp;";

                    if(isset($row_type->icon_4))
                        echo $row_type->icon_4."&nbsp;";

                    if(isset($row_type->icon_5))
                        echo $row_type->icon_5."&nbsp;";?>

                    <hr>
                    <img src="/images/categories/<?= $row_type->img; ?>" class="img-responsive" alt="<?= $row_type->name; ?>">
                    <div class="caption">
                        <h3><?= $row_type->title; ?></h3>(1200 annonces)
                        <p class="text-muted"><?= $row_type->text; ?></p>
                        <p><a href="/recherche/<?= $row_type->url; ?>" class="btn btn-primary" role="button">Je choisi les vacances "<?= $row_type->name; ?>"</a></p>
                    </div>
                </div>
            </div><?
        }?>
    </div>
</div>