<?php

class Config
{
    public static $hote = "127.0.0.1";
    public static $user = "root";
    public static $Mpass = "darkevengyl";

    //si pas spécifiée elle sera crée avec le nom du dossier parent root général
    public static $base = "";
    

    public static $mail = "pas encore d'adresse mail@gmail.com";

    public static $footer_text = "Créé et maintenu par Evengyl, Go Hollidays© 2018";

    public static $bsd_first_init = false;

    public static $is_connect = 0;

    public static function set_name_base($base)
    {
        self::$base = $base;
    }

    public static function list_var()
    {
        affiche_pre(get_class_vars(get_class($this)));
    }
}

