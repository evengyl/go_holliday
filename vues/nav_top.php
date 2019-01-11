<div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/Accueil">
                <img class="" style="display:inline;" src="/images/logo.png" alt="">
                <span class="" style="display: inline; margin-top:5px;" class="thin"><?= $_app->site_name; ?></span><br>
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li class=""><form><input type="text" style="margin-top:8px;" class="form-control" name="search" placeholder="Recherche"></form></li>
                <li class="<?=($_GET['page'] == 'home')?'active':'' ?>"><a href="/Accueil">__TRANS_accueil__</a></li>
                <li class="<?=($_GET['page'] == 'recherche')?'active':'' ?>"><a href="/Recherche">Recherche de vacances</a></li>
                <li class="<?=($_GET['page'] == 'contact')?'active':'' ?>"><a href="/Contact">__TRANS_contact_us__</a></li><?

                if($_app->option_app['app_with_login_option'])
                {
                    if(Config::$is_connect)
                    {
                        $active = "";
                        if($_GET['page'] == 'my_account')
                            $active = "active";
                        echo '<li class="' . $active . '"><a href="/Mon_compte">Mon Compte</a></li>';
                    }

                    if(!Config::$is_connect)
                    {
                        $active = "";
                        if($_GET['page'] == 'login')
                            $active = "active";
                        echo '<li class="' . $active . '"><a class="btn" href="/Connection">Se connecter</a></li>';
                    }

                    if(Config::$is_connect)
                    {
                        $active = "";
                        if($_GET['page'] == 'logout')
                            $active = "active";
                        echo '<li class="' . $active . '"><a class="btn" href="/Deconnection">Se déconnecter</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
        __MOD2_breadcrumb__
    </div>
</div> 