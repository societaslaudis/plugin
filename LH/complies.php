<?php

function complies($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
$output= intitule_soir();

$output.="<tr><td class=\"gauche\"><center><i>Ad Completorium</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Completorium", $lang)."</i></center></td></tr>";

// Initial
$output.= affiche_texte("initial_GHeure",$lang);
$output.= alleluia();

$output.= affiche_texte("Consciencia_discussio",$lang);
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_complies");
$hrr=$hr[0];
$output.= @hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/comp_ant1");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/comp_ps1");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/comp_ant2");
$arr=$ar[0];
if($arr) $output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/comp_ps2");
$prr=$pr[0];
if($prr) $output.= psaume($prr,$lang);
if($arr) $output.= antienne($arr,$lang);
// ant3 et  PS3

// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/comp_LB");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/comp_RB");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus

$output.= antienne("AN_Salva_nos_Domine",$lang);
$output.= psaume("nunc_dimittis",$lang);
$output.= antienne("AN_Salva_nos_Domine",$lang);

$oratio=$xml->xpath("ordo[@id='RE']/comp_oratio");
$output.="
	<tr><td class=\"gauche\">Orémus.</td>
	<td class=\"droite\">".get_traduction("Orémus", $lang).".</td></tr>";	
$output.= oratio($oratio[0],$lang);
// Noctem quietam.
$output.= affiche_texte("Noctem_quietam",$lang);
// Antienne mariale
$AM=$xml->xpath("ordo[@id='RE']/comp_AM");
$AMM=$AM[0];
$output.= affiche_texte($AMM,$lang);

return $output;
}

?>