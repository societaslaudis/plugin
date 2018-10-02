<?php

function tierce($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
$tierce= intitule();

$of=$xml->xpath("//ordo[@id='RE']//office_matin/la");
if($of[0]) $off=$of[0];
if($off) {
	$tierce.="<tr><td class=\"gauche\"><center><i>".$off."</i></center></td>";
	$tierce.="<td class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></td></tr>";
}
else $tierce.="<tr><td class=\"gauche\"><center><i>Ad Tertiam</i></center></td><td class=\"droite\"><center><i>".get_traduction("Ad Tertiam", $lang)."</i></center></td></tr>";

// Initial
$tierce.= affiche_texte("initial_GHeure",$lang);
$tierce.= alleluia();
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_3");
$hrr=$hr[0];
$tierce.= hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$tierce.= antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps4");
$prr=$pr[0];
$tierce.= psaume($prr,$lang);
$tierce.= antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
if($arr) $tierce.= antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps5");
$prr=$pr[0];
if($prr) $tierce.= psaume($prr,$lang);
if($arr) $tierce.= antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
if($arr) $tierce.= antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps6");
$prr=$pr[0];
if($prr) $tierce.= psaume($prr,$lang);
if($arr) $tierce.= antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_3");

$lrr=$lr[0];
//print "<b>".$lrr."</b>";
$tierce.= lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_3");
$rrr=$rr[0];

$tierce.= affiche_texte($rrr,$lang);

$oratio=$xml->xpath("ordo[@id='RE']/oratio_3");
$tierce.="
	<tr><td  class=\"gauche\">Orémus.</td>
	<td class=\"droite\">".get_traduction("Orémus", $lang).".</td></tr>
	";	
$tierce.=  oratio($oratio[0],$lang);

$tierce.= affiche_texte("Benedicamus_Domino",$lang);

$tierce.="<tr><td class=\"gauche\"><hr><center><i>Ad Tertiam - psalmodia complementaria</i></center></td>
<td class=\"droite\"><hr><center><i>A Tierce - psalmodie complémentaire.</i></center></td></tr>";

$tierce.="<tr><td class=\"gauche rubrique\">Post ℣. Deus, in adiutórium et hymnum, dicuntur psalmi graduales qui sequuntur cum suis antiphonis.</td>
<td class=\"droite rubrique\">Après le ℣. Dieu, viens à mon aide et l'hymne, on peut [choisir de] dire [ad libitum, à la place des précédents] les psaumes graduels qui suivent avec leurs antiennes.</td></tr>";

$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
$tierce.= antienne($arr,$lang,"1");
$tierce.=psaume("ps119",$lang);

$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
$tierce.= antienne($arr,$lang,"2");
$tierce.=psaume("ps120",$lang);

$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
$tierce.= antienne($arr,$lang,"3");
$tierce.=psaume("ps121",$lang);
return $tierce;
}
?>
