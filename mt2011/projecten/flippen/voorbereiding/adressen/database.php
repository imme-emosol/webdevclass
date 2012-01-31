<?php

$databasehost  =  'localhost';
$databasegebruikersnaam  =  'php';
$databasegebruikerswachtwoord  =  'php';
$databasenaam  =  'php_ma_mt_2011_adressen';
$databasetabelnaam  =  'personen';
$databasetabelkolomnamen  =  array(
	'persoon_id' ,
	'voornaam' ,
	'achternaam' ,
	'tussenvoegsels' ,
	'adres'
);
$databaseverbinding  =  new MySQLi(
	$databasehost ,
	$databasegebruikersnaam ,
	$databasegebruikerswachtwoord ,
	$databasenaam
);
if ( $databaseverbinding->connect_error )
	exit( 'probleem' );
