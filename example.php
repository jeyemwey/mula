<?php

header("charset: utf-8");

/**
 * Testing environment. For easing porpuses I'm using spl-autoloading to load the classes dynamicly.
 * @author Jannik / @gltyllthsm / Github: jeyemwey
 */ 
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

/**
 * Create new instance of MuLa with language-code from your DB.
 * @var MuLa 
 */
$MuLa = new MuLa( MuLaFileReader::CSV("lang/fr-fr.csv", "|") );

/**
 * Display example string.
 */
echo $MuLa->get("Hello World"), "<br />", $MuLa->get("contact-us@example.com");