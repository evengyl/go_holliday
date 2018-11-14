<?
##########################################
#	Createur : Evengyl
#	Date de creation : 23-03-2017
##########################################

$timestamp = date("U");

function info_php()
{
    echo phpinfo();
}

function paragraphe_style($txt)
{
    echo '<div class="col-lg-12" style="margin-top:5px;"><p style="font-size:12px; padding:6px; text-align:center;" class="bg-success">'.$txt.'</p></div>';
}   

function logout($base_dir)
{
    require($base_dir.'/public/logout.php');
}

function affiche_pre($var_a_print)
{
    ?><div class='col-xs-12' style='z-index: 1; margin-bottom:50px;'><pre><?
        print_r($var_a_print);
    ?></pre></div><?
}
