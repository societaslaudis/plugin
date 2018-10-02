<?php

function vepres($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];
$output="";
//////// INTITULE
$output.= intitule_soir();

$of=$xml->xpath("//ordo[@id='RE']//office_soir/la");
if($of[0]) $off=$of[0];
if($off) {
	$output.="<tr><td class=\"gauche\"><center><i>".$off."</i></center>";
	$output.="<td class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></td></tr>";
}
else $output.="<tr>
<td class=\"gauche\"><center><i>Ad Vesperas</i></center></td>
<td class=\"droite\"><center><i>".get_traduction("Ad Vesperas", $lang)."</i></center></td>
</tr>";

// Initial
$output.= affiche_texte("initial_GHeure",$lang);
$output.= alleluia();
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_vepres");
$hrr=$hr[0];
$output.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant7");
$arr=$ar[0];
$output.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps7");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant8");
$arr=$ar[0];
$output.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps8");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant9");
$arr=$ar[0];
$output.= antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps9");
$prr=$pr[0];
$output.= psaume($prr,$lang);
$output.= antienne($arr,$lang);
// Lecon et répons bref
$lr=@$xml->xpath("ordo[@id='RE']/LB_soir");
$lrr=$lr[0];
$output.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_soir");
$rrr=$rr[0];
$output.= reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("ordo[@id='RE']/magnificat");
$brr=$br[0];
$output.= antienne($brr,$lang);
$output.= psaume("magnificat",$lang);
$output.= antienne($brr,$lang);
$preces=$xml->xpath("ordo[@id='RE']/vepres_preces");
$pp="PRECES_".$preces[0]."_vepres";
$output.= preces($pp,$lang);
$output.= pater($lang);
$oratio=$xml->xpath("ordo[@id='RE']/oratio_vepres");
//print_r($oratio);
$output.= collecte($oratio[0],$lang);
/// CONCLUSION
$output.= affiche_texte("LH_conclusion_Gheure",$lang);
$output.= affiche_texte("LH_fin_Gheure",$lang);
//print $output;
$output=rougis_verset($output);
return $output;
}

?>
