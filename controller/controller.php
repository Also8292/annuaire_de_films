<?php

require 'vendor/autoload.php';
require 'model/model.php';

$page = basename($_SERVER['REQUEST_URI']);

if($page == 'accueil' || $page == '/') {
    // $model_accueil = model_accueil();
}
else if($page == 'about') {
    // $model_apropos = model_apropos();
}
