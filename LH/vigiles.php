<?php

function vigiles($date,$ordo) {
	

	
$lang=$GLOBALS['lang'];
$option=$GLOBALS['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];

$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];
$output="";

//////// INTITULE
$output.= intitule();

//print"laudes";

$output.="<tr><td class=\"gauche\"><center><i>Ad Vigilas</i></center></td>
<td class=\"droite\"><center><i>".get_traduction("Ad Vigilias", $lang)."</i></center></td></tr>";
//print $output;
// Initial
//$output.= affiche_texte("initial_GHeure",$lang);
//$output.= alleluia();

// Hymne
//$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_laudes");
//$hrr=$hr[0];

//$output.= hymne($hrr,$lang);

// ant1 et  PS1
/*
$ar=$xml->xpath("ordo[@id='RE']/ant1");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps1");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant2");
$arr=$ar[0];
$output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps2");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant3");
$arr=$ar[0];
$output.= antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps3");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_matin");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_matin");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("ordo[@id='RE']/benedictus");
$brr=$br[0];
$output.= antienne($brr,$lang);
$output.= psaume("benedictus",$lang);
$output.= antienne($brr,$lang);
$preces=$xml->xpath("ordo[@id='RE']/laudes_preces");
$pp="PRECES_".$preces[0]."_laudes";
$output.= preces($pp,$lang);
$output.= pater($lang);
$oratio=$xml->xpath("ordo[@id='RE']/oratio_laudes");
//print_r($oratio);
$output.= collecte($oratio[0],$lang);
/// CONCLUSION
$output.= affiche_texte("LH_conclusion_Gheure",$lang);
$output.= affiche_texte("LH_fin_Gheure",$lang);
* */

$N1=$xml->xpath("ordo[@id='RE']/LEC_NOCT1");
$N=$N1[0];
//print $N."<br/>";
$output=leconsVigiles($N,$lang);

$N2=$xml->xpath("ordo[@id='RE']/LEC_NOCT2");
$N=$N2[0];
//print $N."<br/>";

$output.=leconsVigiles($N,$lang);

$N3=$xml->xpath("ordo[@id='RE']/LEC_NOCT3");
$N=$N3[0];
//print $N."<br/>";

if($N3[0]) $output.=leconsVigiles($N,$lang);
$output=rougis_verset($output);

return $output;

	//return "machin";
}

?>
