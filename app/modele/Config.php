<?php

class Config
{
    public static $hote = "127.0.0.1";
    public static $user = "root";
    public static $Mpass = "darkevengyl";

    //si pas spécifiée elle sera crée avec le nom du dossier parent root général
    public static $base = "go_holliday";
    

    public static $mail = "info.go.holliday@gmail.com";

    public static $footer_text = "Créé et maintenu par Evengyl, Go Hollidays© 2019";

    public static $bsd_first_init = false;

    public static $is_connect = 0;

    public static function set_name_base($base)
    {
        self::$base = $base;
    }
}

