<h4 class="title">Listes de vos annonces</h4><hr>
<ul class="list-unstyled list_annonces_max">

    <?
    $i = 0;
    while($i < 10)
    {?>
        
        <li>
            <div class="row" style="padding-left:15px; padding-right:15px;">
                <div class="col-xs-2">
                    <div class="avatar_annonce">
                        <img src="/images/autre_licences/face-0.jpg" alt="Circle Image" class="img-circle img-responsive">
                    </div>
                </div>
                <div class="col-xs-4">
                    <b>Nom de l'annonce</b>
                    <br>
                    <span class="text-muted"><small>Date d'ajout : 12/12/2018</small></span>
                    <br>
                    <span class="text-muted"><small>154 Vues</small></span>
                    <br>
                    <span class="text-muted"><small>Date : du <b>01/01/1991</b> au <b>31/12/2018</b></small></span>
                    <br>
                    <span class="text-muted"><small>Prix demandé : <b style="color:red;">250 €</b></small></span>
                    <br>
                    <span class="text-muted"><small>Nombre de demandes : <b style="color:green;">123</b></small></span>
                    <br>
                    <span class="text-muted"><small>Active : <b style="color:green;">Oui</b></small></span>
                </div>

                <div class="col-xs-6 text-right">
                    <btn class="btn btn-success" style="padding:6px 10px; margin-top:10px;"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir l'annonce</small></btn>
                    <btn class="btn btn-info" style="padding:6px 10px; margin-top:10px;"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis</small></btn>
                    <btn class="btn btn-danger" style="padding:6px 10px; margin-top:10px;"><small><i class="fa fa-angle-double-right "></i>&nbsp;Marquer comme supprimée</small></btn>
                    <btn class="btn btn-warning" style="padding:6px 10px; margin-top:10px;"><small><i class="fa fa-angle-double-right "></i>&nbsp;Editer</small></btn>
                    <btn class="btn btn-info" style="padding:6px 10px; margin-top:10px;"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les demandes</small></btn>
                </div>
            </div>
            <hr><hr>
        </li><?
        $i++;
    }    ?>

</ul>