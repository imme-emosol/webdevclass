<?php
$overzicht  =  '';
require 'database.php';
$sql  =  'SELECT persoon_id , voornaam , achternaam , tussenvoegsels , adres FROM personen';
$resultaat  =  $databaseverbinding->query( $sql );
if ( $resultaat )
{
	$overzicht .= '<h2>Overzicht</h2>';
	$overzicht .= '<table>';
	$overzicht .= '<thead>';
	$overzicht .= '<tr>';
	$overzicht .= '<th>';
	$overzicht .= 'voornaam';
	$overzicht .= '</th>';
	$overzicht .= '</tr>';
	$overzicht .= '</thead>';
	$overzicht .= '<tbody>';
	while ( $resultaat_rij = $resultaat->fetch_assoc() )
	{
		$overzicht .=  '<tr>'
			. '<td>' . $resultaat_rij[ 'voornaam' ] . '</td>'
			. '</tr>'
		;
	}
	$overzicht .= '</tbody`>';
	$overzicht .= '</table>';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ContactApp</title>
		<link rel="stylesheet" href="main.css" media="screen" />
	</head>
	<body>
		<h1>ContactApp</h1>
		<form method="post" action="./contactpersoon.php">
			<fieldset>
				<legend>Nieuw contactpersoon</legend>
				<dl>
					<dt>
						<label for="voornaam_veld">voornaam</label>
					</dt>
					<dd>
						<input name="voornaam" id="voornaam_veld" type="text" />
						<ul class="voorwaarden">
							<li>verplicht</li>
							<li>aaneengesloten rij van tekens</li>
							<li>mogelijke tekens a tot en met z</li>
							<li>maximaal 22 tekens</li>
							<li>minimaal 2 tekens</li>
						</ul>
					</dd>
					<dt>
						<label for="achternaam_veld">achternaam</label>
					</dt>
					<dd>
						<input name="achternaam" id="achternaam_veld" type="text" />
						<ul class="voorwaarden">
							<li>verplicht</li>
							<li>aaneengesloten rij van tekens</li>
							<li>mogelijke tekens a tot en met z</li>
							<li>maximaal 22 tekens</li>
							<li>minimaal 3 tekens</li>
						</ul>
					</dd>
					<dt>
						<label for="tussenvoegsels_veld">tussenvoegsels</label>
					</dt>
					<dd>
						<input name="tussenvoegsels" id="tussenvoegsels_veld" type="text" />
						<ul class="voorwaarden">
							<li>niet verplicht</li>
							<li>mogelijke tekens a-z, spatie</li>
							<li>maximaal 10 tekens</li>
							<li>minimaal 2 tekens</li>
						</ul>
						<ul class="voorbeelden">
							<li>van</li>
							<li>van der</li>
						</ul>
					</dd>
					<dt>
						<label for="adres_veld">adres</label>
					</dt>
					<dd>
						<input name="adres" id="adres_veld" type="text" />
						<ul class="voorwaarden">
							<li>verplicht</li>
							<li>mogelijke tekens a-z, spatie en 0-9</li>
							<li>formaat: straatnaam huisnummer met eventuele toevoeging</li>
							<li>minimaal 6 tekens voor de straatnaam</li>
							<li>minimaal 1 teken voor het huisnummer</li>
							<li>maximaal 212 tekens voor de straatnaam (inclusief spaties)</li>
							<li>maximaal 4 tekens voor het huisnummer</li>
							<li>maximaal 4 tekens voor de eventuele huisnummertoevoeging</li>
						</ul>
					</dd>
				</dl>
				<input type="submit" />
			</fieldset>
		</form><?php echo $overzicht; ?>
	</body>
</html>