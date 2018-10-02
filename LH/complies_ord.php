<?php

function complies_ord($id) {
$lang=$GLOBALS['lang'];
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
$xml=simplexml_load_file("../sources/".$id.".xml");


//////// INTITULE


// Initial
$output.=intitule_ord($id);
$output.= "
		<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">Ad Completorium</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction("Ad Completorium",$lang)."</td></tr>";
$output.= "
		<tr><td class=\"gauche\">V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.</td>
		<td class=\"droite\">".get_traduction("V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.",$lang)."</td></tr>";

$output.= affiche_texte("Consciencia_discussio",$lang);
// Hymne
$hr=$xml->xpath("/liturgia/HYMNUS_completorium/@id");
$hrr=$hr[0];
$output.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("/liturgia/ant10/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("/liturgia/PS10/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("/liturgia/ant11/@id");
$arr=$ar[0];
if($arr) $output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("/liturgia/PS11/@id");
$prr=$pr[0];
if($prr) $output.= PSaume($prr,$lang);
if($arr) $output.= antienne($arr,$lang);
// ant3 et  PS3

// Lecon et répons bref
$lr=$xml->xpath("/liturgia/LB_completorium/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_completorium/@id");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus

$output.= antienne("AN_Salva_nos_Domine",$lang);
$output.= PSaume("nunc_dimittis",$lang);
$output.= antienne("AN_Salva_nos_Domine",$lang);

$oratio=$xml->xpath("/liturgia/oratio_completorium/@id");
$output.="
	<tr><td class=\"gauche\">Orémus.</td>
	<td class=\"droite\">".get_traduction("Orémus", $lang).".</td></tr>
	";	
$output.= oratio($oratio[0],$lang);
// Noctem quietam.
$output.= affiche_texte("Noctem_quietam",$lang);
// Antienne mariale
$AM=$xml->xpath("/liturgia/AM/@id");
$AMM=$AM[0];
$output.= affiche_texte($AMM,$lang);

return $output;
}

?>