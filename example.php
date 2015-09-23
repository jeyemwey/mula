<?php

header("charset: utf-8");

include "classes/MuLa.class.php";
include "classes/MuLaFileReader.class.php";


/**
 * Create new instance of MuLa with language-code from your DB.
 * @var MuLa 
 */
$MuLa = new MuLa( MuLaFileReader::CSV("lang/fr-fr.csv", "|") );

/**
 * Display example string.
 */
echo $MuLa->get("Hello World"), "<br />", $MuLa->get("contact-us@example.com");