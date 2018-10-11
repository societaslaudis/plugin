<?php


function none($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
$none= intitule();

$of=$xml->xpath("//ordo[@id='RE']//office_matin/la");
if($of[0]) $off=$of[0];
if($off) {
	$none.="<tr><td></td></tr> class=\"gauche\"><center><i>".$off."</i></center></td>";
	$none.="<td class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></td></tr>";
}
else $none.="<tr><td class=\"gauche\"><center><i>Ad Nonam</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Nonam", $lang)."</i></center></td></tr>";

// Initial
$none.= affiche_texte("initial_GHeure",$lang);
$none.= alleluia();
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_9");
$hrr=$hr[0];
$none.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$none.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps4");
$prr=$pr[0];
$none.= psaume($prr,$lang);
$none.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
if($arr) $none.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps5");
$prr=$pr[0];
if($prr) $none.= psaume($prr,$lang);
if($arr) $none.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
if($arr) $none.= antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps6");
$prr=$pr[0];
if($prr) $none.= psaume($prr,$lang);
if($arr) $none.= antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_9");

$lrr=$lr[0];
//print "<b>".$lrr."</b>";
$none.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_9");
$rrr=$rr[0];
//print "<br>";print_r($rr);
$none.= affiche_texte($rrr,$lang);

$oratio=$xml->xpath("ordo[@id='RE']/oratio_9");
$none.="
	<tr><td  class=\"gauche\">Orémus.</td>
	<td class=\"droite\">".get_traduction("Orémus", $lang).".</td></tr>
	";	
$none.= oratio($oratio[0],$lang);
$none.= affiche_texte("Benedicamus_Domino",$lang);

$none.="<tr><td class=\"gauche\"><hr><center><i>Ad Nonam - psalmodia complementaria</i></center></td>
<td class=\"droite\"><hr><center><i>A None - psalmodie complémentaire.</i></center></td></tr>";

$none.="<tr><td class=\"gauche rubrique\">Post ℣. Deus, in adiutórium et hymnum, dicuntur psalmi graduales qui sequuntur cum suis antiphonis.</td>
<td class=\"droite rubrique\">Après le ℣. Dieu, viens à mon aide et l'hymne, on peut [choisir de] dire [ad libitum, à la place des précédents] les psaumes graduels qui suivent avec leurs antiennes.</td></tr>";
$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$none.= antienne($arr,$lang,"1");
$none.=psaume("ps125",$lang);

$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
$none.= antienne($arr,$lang,"2");
$none.=psaume("ps126",$lang);

$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
$none.= antienne($arr,$lang,"3");
$none.=psaume("ps127",$lang);


return rougis_verset($none);
}





?>
