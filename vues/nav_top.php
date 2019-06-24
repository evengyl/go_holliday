<div class="navbar navbar-fixed-top navbar-expand-lg">
    <a class="navbar-brand col align-self-end" href="/Accueil">
        <img style="display:inline;" src="/images/logo.png" alt="">
        <span style="display: inline; margin-top:5px;" class="thin"><?= $_app->site_name; ?></span><br>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_bar_top" aria-controls="nav_bar_top" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav_bar_top">
        <ul class="navbar-nav col align-self-end">


            <li class="nav-item <?=($_GET['page'] == 'home')?'active':'' ?>"><a class="nav-link" href="/Accueil">__TRANS_accueil__</a></li>
            <li class="nav-item <?=($_GET['page'] == 'recherche')?'active':'' ?>"><a class="nav-link" href="/Recherche">Recherche de vacances</a></li>
            <li class="nav-item <?=($_GET['page'] == 'contact')?'active':'' ?>"><a class="nav-link" href="/Contact">__TRANS_contact_us__</a></li><?

            if($_app->option_app['app_with_login_option'])
            {
                if(Config::$is_connect)
                {
                    $active = "";
                    if($_GET['page'] == 'my_account')
                        $active = "active";
                    echo '<li class="nav-item ' . $active . '"><a class="nav-link" href="/Mon_compte">Mon Compte</a></li>';
                }

                if(!Config::$is_connect)
                {
                    $active = "";
                    if($_GET['page'] == 'login')
                        $active = "active";
                    echo '<li class="nav-item ' . $active . '"><a class="nav-link" class="btn" href="/Connexion">Se connecter</a></li>';
                }

                if(Config::$is_connect)
                {
                    $active = "";
                    if($_GET['page'] == 'logout')
                        $active = "active";
                    echo '<li class="nav-item ' . $active . '"><a class="nav-link" class="btn" href="/Deconnection">Se déconnecter</a></li>';
                }

                
            }
            ?>
        </ul>
        <form class="form-inline col align-self-end">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Recherche">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>
    </div>
        __MOD2_breadcrumb__
</div> 

