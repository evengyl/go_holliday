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




