<div class="secondary" id="head"></div>
<div class="container-fluid text-center">

    <div class="row">
        <h2 class="thin">Mon compte</h2>
        <p class="text-center text-danger">
            <b><?= (isset($_SESSION["error_admin"]))?$_SESSION["error_admin"]:''; ?></b>
        </p>

        <?=(isset($_SESSION['error_change_password']))?"<h4 style='color:red;' class='title'>" . $_SESSION['error_change_password'] . "</h4><hr>":""; ?>
    </div>

    <div class="row page-profil">
        <div class="col-xs-3">
            __MOD3_my_account_lateral_left_profil__
        </div>


        <div class="col-xs-7">
		    <div class="col-xs-12 annonces_list"><?

                if(isset($_GET['second_page']))
                {
                    if($_GET['second_page'] == "Messages")
                        echo "__MOD2_my_account_messagery__";

                    if($_GET['second_page'] == "Mes_favoris")
                        echo "__MOD2_my_account_favorite__";

                    if($_GET['second_page'] == "Mes_documents")
                        echo "__MOD2_my_account_documents__";

                    if($_GET['second_page'] == "Mes_demandes")
                        echo "__MOD2_my_account_list_demand_success__";
                }

                else if($_app->can_do_user->view_infos_annonce)
                    echo "__MOD2_my_account_list_annonces_annonceur__";
                
                else
                    echo "__MOD2_my_account_client__";?>
    		</div>
	    </div>

    	<div class="col-xs-2">
            __MOD2_my_account_lateral_right_account__
        </div>

    </div>
</div>

<? unset($_SESSION["error_admin"]); ?>