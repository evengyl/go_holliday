<?php

class Config
{
    public static $hote = "127.0.0.1";
    public static $user = "root";
    public static $Mpass = "darkevengyl";

    //si pas spécifiée elle sera crée avec le nom du dossier parent root général
    public static $base = "go_holliday";

    public static $base_url = "goholiday.be";    

    public static $mail = "info.go.holliday@gmail.com";

    public static $footer_text = "Créé et maintenu par Evengyl, Go Hollidays© 2019";

    public static $bsd_first_init = false;

    public static $is_connect = 0;

    public static $tel_commercial = "+32 (0)468 36 17 82";
    public static $tel_technical = "+32 (0)497 31 25 23";

    public static $mail_spam = "info.go.holliday@gmail.com";


    public static $length_pseudo_min = 6;
    public static $length_password_min = 6;
    
    public static function set_name_base($base)
    {
        self::$base = $base;
    }
}

