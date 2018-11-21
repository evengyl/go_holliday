<div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/home">
                <img class="" style="display:inline;" src="/images/logo.png" alt="">
                <span class="" style="display: inline; margin-top:5px;" class="thin"><?= $_app->site_name; ?></span><br>
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="<?=($_GET['page'] == 'home')?'active':'' ?>"><a href="/home">__TRANS_accueil__</a></li>
                <li class="<?=($_GET['page'] == 'recherche')?'active':'' ?>"><a href="/Recherche">Recherche de vacances</a></li>
                <li class="<?=($_GET['page'] == 'contact')?'active':'' ?>"><a href="/contact">__TRANS_contact_us__</a></li><?

                if(isset($_SESSION['pseudo']) && $_SESSION['level'] >= 1 && $_app->option_app['app_with_login_option'] == 1)
                {
                    $active = "";
                    if($_GET['page'] == 'my_account')
                        $active = "active";
                    echo '<li class="' . $active . '"><a href="/my_account">Mon Compte</a></li>';
                }

                if(!isset($_SESSION['pseudo']) && $_app->option_app['app_with_login_option'] == 1)
                {
                    $active = "";
                    if($_GET['page'] == 'login')
                        $active = "active";
                    echo '<li class="' . $active . '"><a class="btn" href="/login">Se connecter</a></li>';
                }

                if(isset($_SESSION['pseudo']) && $_app->option_app['app_with_login_option'] == 1)
                {
                    $active = "";
                    if($_GET['page'] == 'logout')
                        $active = "active";
                    echo '<li class="' . $active . '"><a class="btn" href="/logout">Se déconnecter</a></li>';
                }?>
            </ul>
        </div>
        __MOD2_breadcrumb__
    </div>

</div> 