<?php

function laudes_ord($id) {
	

	
$lang=$GLOBALS['lang'];
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
//$xml=$GLOBALS['liturgia'];
//id = PSalterium/PSalterium11
$xml=simplexml_load_file("../sources/".$id.".xml");
//print_r($xml);
$output="";
//////// INTITULE

// Initial

$output.=intitule_ord($id);
$output.= "
		<tr><td class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">Ad Laudes matutinas</td>
		<td class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction("Ad Laudes matutinas",$lang)."</td></tr>";
$output.= "
		<tr><td class=\"gauche\">V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.</td>
		<td class=\"droite\">".get_traduction("V/. Deus, in adiutórium. Glória Patri. Sicut erat. Allelúia.",$lang)."</td></tr>
		<tr><td class=\"gauche rubrique\">Quae tamen omittuntur quando Invitatorium immediate praecedit.</td>
		<td class=\"droite rubrique\">".get_traduction("Quae tamen omittuntur quando Invitatorium immediate praecedit.",$lang)."</td></tr>";
 
// Hymne
$hr=$xml->xpath("/liturgia/HYMNUS_laudes/@id");
$hrr=$hr[0];

$output.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("/liturgia/ant1/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("/liturgia/PS1/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2

$ar=$xml->xpath("/liturgia/ant2/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("/liturgia/PS2/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("/liturgia/ant3/@id");
$arr=$ar[0];
$output.= antienne($arr,$lang,"3");
$pr=$xml->xpath("/liturgia/PS3/@id");
$prr=$pr[0];
$output.= PSaume($prr,$lang);
$output.= antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("/liturgia/LB_matin/@id");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("/liturgia/RB_matin/@id");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("/liturgia/benedictus/@id");
$brr=$br[0];
if(trim($brr)=="AN") { $output.="<tr><td class=\"gauche rubrique\"> Ad Benedictus, antiphona ut in Proprio de Tempore.</td>
		<td class=\"droite rubrique\">".get_traduction("Ad Benedictus, antiphona ut in Proprio de Tempore.",$lang)."</td></tr>";
}
else {
$output.= "
		<tr><td class=\"gauche rubrique\">Ad Benedictus, </td>
		<td class=\"droite rubrique\">".get_traduction("Ad Benedictus, ",$lang)."</td></tr>";
$output.= antienne($brr,$lang);
}
$preces=$xml->xpath("/liturgia/preces/@id");
$pp="PRECES_".$preces[0]."_laudes";
$output.= preces($pp,$lang);
$output.= "
		<tr><td class=\"gauche\"> Pater noster.</td>
		<td class=\"droite\">".get_traduction(" Pater noster.",$lang)."</td></tr>";
$oratio=$xml->xpath("/liturgia/oratio_laudes/@id");

if(trim($oratio[0])=="COL") {
$output.= "
		<tr><td class=\"gauche rubrique\"> Oratio, ut in proprio de Tempore.</td>
		<td class=\"droite rubrique\">".get_traduction(" Oratio, ut in proprio de Tempore.",$lang)."</td></tr>";


}
else $output.= collecte($oratio[0],$lang);
/// CONCLUSION
$output.= "<tr><td class=\"gauche rubrique\">Conclusio Horae, ut in ordinario.</td>
		<td class=\"droite rubrique\">".get_traduction("Conclusio Horae, ut in ordinario.",$lang)."</td></tr>";

return $output;

	//return "machin";
}

?>