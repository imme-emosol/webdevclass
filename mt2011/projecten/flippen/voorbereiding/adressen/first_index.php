<?php # index.php
$database_servernaam  =  'localhost';
$database_gebruikersnaam  =  'php';
$database_gebruikerswachtwoord  =  'php';
$database_naam  =  'php_ma_mt_2011_adressen';
$database_tabelnaam  =  'adressen';
$database_tabelkolomnamen  =  array(
	'persoon_id' => array(
		'filter' => FILTER_SANITIZE_NUMBER_INT ,
	) ,
	'voornaam' => array(
		'filter' => FILTER_SANITIZE_STRING ,
		 'flags' =>
			FILTER_FLAG_ENCODE_HIGH
			|
			FILTER_FLAG_ENCODE_LOW
		,
# FILTER_NULL_ON_FAILURE
	) ,
	'achternaam' => array(
		'filter' => FILTER_SANITIZE_STRING ,
	) ,
	'tussenvoegsels' => array(
		'filter' => FILTER_SANITIZE_STRING ,
	) ,
	'adres' => array(
		'filter' => FILTER_SANITIZE_STRING ,
#		'flags' => '' ,
#		'options' => '' ,
	) ,
);
//var_dump(
	filter_input( INPUT_GET , 'voornaam' , FILTER_SANITIZE_STRING )
//)
;
//var_dump(
	filter_input(
		INPUT_GET ,
		'voornaam' ,
		FILTER_VALIDATE_REGEXP ,
		array('options'=>array(
			'regexp' => '/a-z/' ,
		))
	)
//)
;
#exit;
# FILTER_VALIDATE_REGEXP
$database_verbinding  =  new MySQLi(
	$database_servernaam ,
	$database_gebruikersnaam ,
	$database_gebruikerswachtwoord ,
	$database_naam
);

$controles  =  $database_tabelkolomnamen;
$nieuw_persoon  =  filter_input_array( INPUT_GET , $controles );
#var_dump( $nieuw_persoon );
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ContactApp</title>
	</head>
	<body>
		<h1>ContactApp</h1>
		<h2>Invoer</h2>
		<form action="" method="post">
			<fieldset>
				<legend>Nieuw persoon</legend>
				<dl>
					<dt>
						<label for="voornaam">Voornaam</label>
					</dt>
					<dd>
						<input type="text" name="voornaam" id="voornaam" />
					</dd>
					<dt>
						<label for="achternaam">Achternaam</label>
					</dt>
					<dd>
						<input type="text" name="achternaam" id="achternaam" />
					</dd>
					<dt>
						<label for="tussenvoegsels">Tussenvoegsels (optioneel)</label>
					</dt>
					<dd>
						<input type="text" name="tussenvoegsels" id="tussenvoegsels" />
					</dd>
					<dt>
						<label for="adres">Adres</label>
					</dt>
					<dd>
						<input type="text" name="adres" id="adres" />
					</dd>
				</dl>
			</fieldset>
			<input type="submit" value="Toevoegen" />
		</form>
<pre><?php
var_dump( $_POST );
?></pre>
	</body>
</html>