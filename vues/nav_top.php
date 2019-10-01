<div class="navbar navbar-inverse navbar-fixed-top headroom" ><?
    if($_app->user->level_admin == 3){
        ?><a style="float:left; margin-left:15px;" class="btn btn-info <?=($_GET['page'] == 'admin')?'active':''; ?>"  href="/admin">Administration</a><?
    }?>

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/Accueil">
                <img style="display:inline;" src="/images/logo.png" alt="">
                <span style="display: inline; margin-top:5px;" class="thin"><?= $_app->site_name; ?></span><br>
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li class=""><form><input type="text" style="margin-top:8px;" class="form-control" name="search" placeholder="Recherche"></form></li>
                <li class="<?=($_GET['page'] == 'home')?'active':'' ?>"><a href="/Accueil">Accueil</a></li>
                <li class="<?=($_GET['page'] == 'recherche')?'active':'' ?>"><a href="/Recherche">Recherche de vacances</a></li>
                <li class="<?=($_GET['page'] == 'contact')?'active':'' ?>"><a href="/Contact">Contactez nous</a></li><?

                if(Config::$is_connect){
                    ?><li class="<?=($_GET['page'] == 'my_account')?'active':''; ?>"><a href="/Mon_compte">Mon Compte</a></li><?
                }

                


                if(!Config::$is_connect){
                    ?><li class="<?=($_GET['page'] == 'my_account')?'active':''; ?>"><a class="btn" href="/Connexion">Se connecter</a></li><?
                }

                if(Config::$is_connect){
                    ?><li class="<?=($_GET['page'] == 'my_account')?'active':''; ?>"><a class="btn" href="/Deconnexion">Se déconnecter</a></li><?
                }?>
                
            </ul>
        </div>
    </div>
</div> 