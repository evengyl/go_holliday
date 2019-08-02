<?
class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
       $base_dir = dirname(dirname(dirname(__FILE__))); // directory renvoi c:/xampp/htdocs/"dossier_du_serveur_courant"
       switch($class)
       {
            case "_db_connect":

                require("Evengyl/modele/".$class.".class.php");

            break;


            case "all_query":
            case "select":
            case "where":
            case "var_processing":
            case "parse_sql":
            case "parse_table_jointure":
            case "order_processing":
            case "limit_processing":
            case "var_processing_select_orm":

                require("Evengyl/core/".$class.".php");

            break;

            case "router":

                require($base_dir."/app/".$class.".php");

            break;


            case "_app":
            case "fct_global_website":
            case "announce_format":
            case "app_init":   
            case "can_do_user":             
            case "parser":
            case "parser_translate":
            case "lang_select":
            case "navigation":

                require($base_dir."/app/includes/".$class.".php");

            break;

            case strpos($class, "admin_") !== false:

                if(file_exists($base_dir."/app/controller/admin_tool/".$class.".php"))
                    require($base_dir."/app/controller/admin_tool/".$class.".php");

            break;

            default:
            
                if(file_exists($base_dir."/app/controller/".$class.'.php'))
                    require($base_dir."/app/controller/".$class.'.php');
                else
                    require($base_dir."/app/controller/p_404.php");
       }        
    }
}?>