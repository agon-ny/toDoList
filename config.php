<?php

$autoLoad = function ($class) {
    include('classess/'.$class.'.php');
};

spl_autoload_register($autoLoad);

//DATABASE CONFIG
define('HOST','localhost');
define('DBNAME','to_do_list');
define('USERNAME','root');
define('PASSWORD','');