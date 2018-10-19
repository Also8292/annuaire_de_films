<?php

require 'vendor/autoload.php';
require 'model/model.php';


//twig config
$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$link = basename($_SERVER['REQUEST_URI']);

if($link == 'annuaire_film') {
    $link = '/';
}

if($link == '/' || $link == 'accueil') {
    $request = show_film();

    $films = array();
    $images = array();

    while($resultat = $request->fetch()) {
        array_push($films, $resultat['nomF']);
        array_push($images, $resultat['pic']);
    }
    
    echo $twig->render('accueil.twig', ['link' => $link, 'title' => $link, 'films' => $films, 'images' => $images]);
}

else if($link == 'about') {
    echo $twig->render('apropos.twig', ['link' => $link, 'title' => $link]);
}

else if($link == 'contacts') {
    echo $twig->render('contact.twig', ['link' => $link, 'title' => $link]);
}
else if($link == 'services') {
    echo $twig->render('services.twig', ['link' => $link, 'title' => $link]);
}