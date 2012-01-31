<?php

if ( empty( $_POST ) )
{
	die(
		'alleen voor het verwerken van formuliergegevens'
		. ' onjuist gebruik, scheer je weg, bengel.'
	);
}
$voornaam        =  trim( $_POST[ 'voornaam' ] );
$achternaam      =  trim( $_POST[ 'achternaam' ] );
$tussenvoegsels  =  trim( $_POST[ 'tussenvoegsels' ] );
$adres           =  trim( $_POST[ 'adres' ] );
// verzoek om toevoegen van contactpersoon
$fouten  =  array(
	'voornaam'       => array() ,
	'achternaam'     => array() ,
	'tussenvoegsels' => array() ,
	'adres'          => array() ,
);
if ( empty( $voornaam ) )
{
	$fouten[ 'voornaam' ][]  =  'is leeg';
}
if ( empty( $achternaam ) )
{
	$fouten[ 'achternaam' ][]  =  'is leeg';
}
if ( empty( $adres ) )
{
	$fouten[ 'adres' ][]  =  'is leeg';
}
if ( !preg_match( '/^[a-z]{2,22}$/' , $voornaam ) )
{
	$fouten[ 'voornaam' ][]  =  'voldoet niet aan voorwaarden';
}
if ( !preg_match( '/^[a-z]{3,22}$/' , $achternaam ) )
{
	$fouten[ 'achternaam' ][]  =  'voldoet niet aan voorwaarden';
}
if ( !empty( $tussenvoegsels ) && !preg_match( '/^[a-z ,]{2,10}$/' , $tussenvoegsels ) )
{
	$fouten[ 'tussenvoegsels' ][]  =  'voldoet niet aan voorwaarden';
}
if ( !preg_match(
	'/^[,a-z0-9 ]{6,212} [1-9][0-9]{0,3} ?[a-z0-9]{0,4}$/'
	, $adres
) )
{
	$fouten[ 'adres' ][]  =  'voldoet niet aan voorwaarden';
}
if (
	!empty(
		$fouten[ 'voornaam' ]
	) || !empty(
		$fouten[ 'achternaam' ]
	) || !empty(
		$fouten[ 'tussenvoegsels' ]
	) || !empty(
		$fouten[ 'adres' ]
	)
)
{
?><h1>U maeckte vauten</h1>
<p>Druk op terug en probeer opnieuw,
u ontvangt geen &euro;200.</p>
<pre><?php
	var_dump( $fouten );
	die;
}
### Toegang tot flippen-database.
require 'database.php';

$voornaam  =  $databaseverbinding->real_escape_string( $voornaam );
$achternaam  =  $databaseverbinding->real_escape_string( $achternaam );
$tussenvoegsels  =  $databaseverbinding->real_escape_string( $tussenvoegsels );
$adres  =  $databaseverbinding->real_escape_string( $adres );

$sql  =  'INSERT INTO personen ( persoon_id , voornaam , achternaam , tussenvoegsels , adres ) VALUES ( null , \'' . $voornaam . '\' , \'' . $achternaam . '\' , \'' . $tussenvoegsels . '\' , \'' . $adres . '\' )';

$resultaat  =  $databaseverbinding->query( $sql );
if ( !$resultaat )
{
	die(
		'persoon niet kunnen toevoegen; '
		. $databaseverbinding->error
	);
}
header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
echo 'persoon kunnen toevoegen';