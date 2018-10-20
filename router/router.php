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
    $desc = array();

    while($resultat = $request->fetch()) {
        array_push($films, $resultat['nomF']);
        array_push($images, $resultat['pic']);
        array_push($desc, $resultat['descript']);
    }
    
    echo $twig->render('accueil.twig', ['title' => $link, 'films' => $films, 'images' => $images, 'description' => $desc]);
}

else if($link == 'about') {
    echo $twig->render('apropos.twig', ['title' => $link]);
}

else if($link == 'contacts') {
    echo $twig->render('contact.twig', ['title' => $link]);
}
else if($link == 'services') {
    echo $twig->render('services.twig', [ 'title' => $link]);
}