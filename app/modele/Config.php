<?php

class Config
{
    public static $hote = "localhost";
    public static $user = "root";
    public static $Mpass = "darkevengyl";

    //si pas spécifiée elle sera crée avec le nom du dossier parent root général
    public static $base = "";
    
    public static $base_path = "";

    public static $prefix_sql = "";
    public static $mail = "perroquet484@gmail.com";
    public static $footer_text = "Evengyl micro framework. Cr\u00e9\u00e9 par Baudoux Lo\u00efc";
    public static $name_website = "Framework";
    public static $name_head_nav = "Entre nous";
    public static $need_sys_connection = "";
    public static $bsd_first_init = false;


    public static $view_time_executed_in_footer_page = false;
    public static $view_sql_list = false;
    

    public static $is_connect = 0;
    public static $list_req_sql = array();

    public static $view_tpl_in_source_code = 1;


    public static function set_name_base($base)
    {
        self::$base = $base;
    }

    public static function list_var()
    {
        affiche_pre(get_class_vars(get_class($this)));
    }
}

