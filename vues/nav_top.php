<div class="navbar navbar-inverse navbar-fixed-top headroom" ><?
    if(isset($_app->user->level_admin) && $_app->user->level_admin == 3 || (isset($_SESSION["return_ad"]) && $_SESSION["return_ad"] == 1)){
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
                <span style="display:inline; margin-top:5px;" class="thin"><?= $_app->site_name; ?></span><br>
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <form>
                        <input type="text" style="margin-top:8px;" id="search_form" class="form-control" name="search" placeholder="Recherche">

                        <ul class="dropdown_search dropdown-menu" style="background-color:rgba(0, 0, 0, .9); top:72px; left:-250px; width:1100px;">
                            <li class="res-search" style="float:left; width:500px;">
                                <ul class="nav">
                                </ul>
                            </li>
                            <li class="pre-search" style="border-left:1px solid DimGrey; float:right; width:600px;">
                                <ul class="nav">

                                </ul>
                            </li>
                        </ul>
                    </form>
                </li>
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

<script>
$(document).ready(function()
{
    $(window).click(function(e)
    {
        if($(".dropdown-menu:visible"))
        {
            $(".pre-search ul").html("");
            $(".res-search ul").html("");
            $(".dropdown-menu").hide();
        }
    });


    $("#search_form").click(function(e)
    {
    
        $(".dropdown-menu").show();
        $(".pre-search ul").html("");
        $(".res-search ul").html("<li class='top_categ'><i class='fas fa-search'></i>&nbsp;Résultats de votre recherche</li>")

        e.stopPropagation()

        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/search.php',
            dataType : "HTML",
            data : {"action" : "pre_search"},
            success : function(data_return)
            {
                var data =  JSON.parse(data_return);
                
                $.each( data, function(keys, obj)
                {
                    $(".pre-search ul").append('<li class="col-xs-12 top_categ">'+keys+'</li>');

                    $.each( obj, function(key, value)
                    {
                        
                        if(key == "3") 
                            $(".pre-search ul").append("<li class='col-xs-2'>&nbsp;</li>");

                        $(".pre-search ul").append(value.data);
                        
                    });

                    $(".pre-search ul").append('<li role="separator" style="background-color:DimGrey;" class="col-xs-12 divider"></li>');
                });

            }
        });




    });

     

    $("#search_form").keyup(function(e)
    {
        e.stopPropagation()

        var value_form = $("#search_form").val();

        if(value_form.length > 3)
        {
            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/search.php',
                dataType : "HTML",
                data : {"action" : "res_search", "value" : value_form},
                success : function(data_return)
                {
                    var data =  JSON.parse(data_return);
                    
                    $.each( data, function(keys, obj)
                    {
                        $(".res-search ul").append(obj);
                    });

                }
            });

        }
    });


    

    

});


</script>