<header id="head" class="secondary"></header>
<div class="container-fluid text-center" style="background-color: #f2f2f2;">
    <div class="row">
        <h2 class="thin">Mon compte</h2>
        <?=(isset($_SESSION['error_change_password']))?"<h4 style='color:red;' class='title'>" . $_SESSION['error_change_password'] . "</h4><hr>":""; ?>
    </div>
    <div class="row page-profil">
        <div class="col-lg-3">
            <div class="profil">
                <div class="back_profil">
                    <img class="img-responsive" src="/images/background_profil/<?= $_app->user->id_background_profil; ?>.jpg" alt="..."/>
                    <div class="in_top_right"><button data-toggle="modal" data-target="#change_back_profil" class="btn" style=""><i class="fa fa-cog"></i></button></div>
                </div>
                __MOD3_view_lateral_profil__
            </div>
        </div>

         <!-- Modal changement de back profil -->
         <? require("edit_background_profil.php"); ?>

        <div class="col-lg-7 row">
		    <div class="col-lg-12 annonces_list">
				<?
                if(isset($_GET['create_announce'])) 
                    echo "__MOD3_create_announce__";
                else if($_app->can_do_user->view_infos_annonce)
                    require ($_app->base_dir.'/vues/list_annonces_annonceurs.php');
                else
                    echo "__MOD3_account_client__";?>
    		</div>
	    </div>
        

    	<div class="col-lg-2">
        	<div class="option_account">
                <? require('list_option_account.php'); ?>
        	</div>
        </div>

    </div>
</div>


	<!-- Modal Lost login-->
<? require("modal_lost_password.php"); ?>

__MOD2_form_profil__

__MOD2_edit_preference__


        
<? unset($_SESSION['error_change_password']); ?>